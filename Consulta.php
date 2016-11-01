<!DOCTYPE html>
<HTML>
    <HEAD>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#content div:nth-child(1)").show();
                $(".abas li:first div").addClass("selected");
                $(".aba").click(function () {
                    $(".aba").removeClass("selected");
                    $(this).addClass("selected");
                    var indice = $(this).parent().index();
                    indice++;
                    $("#content div").hide();
                    $("#content div:nth-child(" + indice + ")").show();
                });

                $(".aba").hover(
                        function () {
                            $(this).addClass("ativa")
                        },
                        function () {
                            $(this).removeClass("ativa")
                        }
                );
            });



        </script>
        <TITLE>Consultas</TITLE>
    </HEAD>
    <BODY>
        <?php
        error_reporting(0);
        include './Cliente.php';
        include './Animal.php';
        include './MySQL.php';

        include './Menu.php';
        $mySQL = new MySQL;
        $query1 = "
                Select 
                    agenda.ID_con,
                    agenda.Data_con,
                    agenda.HIni_con,
                    agenda.HFim_con,
                    agenda.Tipo_con,
                    agenda.Preco_con,
                    clientes.Nome_cli
                FROM agenda
                INNER JOIN animais
                ON agenda.ID_pet = animais.ID_pet
                INNER JOIN clientes
                ON animais.ID_cli = clientes.ID_cli
                WHERE agenda.Tipo_con <> 'Consulta' ;
                
";
        
        $rs1 = $mySQL->executeQuery($query1);
        $rs1_totalRows = mysql_num_rows($rs1);
        $result1 = mysql_query("$query1");
        
        $query2 = "
                    Select 
                    agenda.ID_con,
                    agenda.Data_con,
                    agenda.HIni_con,
                    agenda.HFim_con,
                    agenda.Tipo_con,
                    agenda.Preco_con,
                    clientes.Nome_cli
                FROM agenda
                INNER JOIN animais
                ON agenda.ID_pet = animais.ID_pet
                INNER JOIN clientes
                ON animais.ID_cli = clientes.ID_cli
                WHERE agenda.Tipo_con = 'Consulta' ; 
                    
";
        $rs2 = $mySQL->executeQuery($query2);
        $rs2_totalRows = mysql_num_rows($rs2);
        $result2 = mysql_query("$query2");
        if (isset($_GET['id'])) {
            $id= htmlspecialchars((empty($_GET['id'])) ? '0' : $_GET['id']);
            $query8 = "
                    Select 
                        ID_con,
                        Data_con,
                        HIni_con,
                        HFim_con,
                        Tipo_con,
                        Preco_con
                    FROM agenda
                    WHERE ID_con = '".$id."' ;
                ";
            $rs8 = $mySQL->executeQuery($query8);
            $rs8_totalRows = mysql_num_rows($rs8);
            $result8 = mysql_query("$query8");
            $row8 = mysql_fetch_array($rs8, MYSQL_NUM);
                    
        }
        
        if (isset($_POST['deletar'])) {
            $id1 = htmlspecialchars((empty($_POST['idLbl'])) ? '0' : $_POST['idLbl']);
            $query10="DELETE FROM agenda WHERE ID_con = '".$id1."';";
            $mySQL->executeQuery($query10);
        }
        if (isset($_POST['alterar'])) {
            $id1 = htmlspecialchars((empty($_POST['idLbl'])) ? '0' : $_POST['idLbl']);
            $data = htmlspecialchars((empty($_POST['data'])) ? '0' : $_POST['data']);
            $ini = htmlspecialchars((empty($_POST['ini'])) ? '0' : $_POST['ini']);
            $fim = htmlspecialchars((empty($_POST['fim'])) ? '0' : $_POST['fim']);
            $tipo = htmlspecialchars((empty($_POST['tipo'])) ? '0' : $_POST['tipo']);
            $cli = htmlspecialchars((empty($_POST['cli'])) ? '0' : $_POST['cli']);
            $ani = htmlspecialchars((empty($_POST['ani'])) ? '0' : $_POST['ani']);
            $query9="UPDATE agenda
                    SET Data_con='".$data."',HIni_con='".$ini."',HFim_con='".$fim."',Tipo_con='".$tipo."'
                    WHERE ID_Con='".$id1."';";
            $mySQL->executeQuery($query9);
            
        }
        if (isset($_POST['btnsalva'])) {
            $data = htmlspecialchars((empty($_POST['data'])) ? '0' : $_POST['data']);
            $ini = htmlspecialchars((empty($_POST['ini'])) ? '0' : $_POST['ini']);
            $fim = htmlspecialchars((empty($_POST['fim'])) ? '0' : $_POST['fim']);
            $tipo = htmlspecialchars((empty($_POST['tipo'])) ? '0' : $_POST['tipo']);
            $cli = htmlspecialchars((empty($_POST['cli'])) ? '0' : $_POST['cli']);
            $ani = htmlspecialchars((empty($_POST['ani'])) ? '0' : $_POST['ani']);
            $preco = "1000";
            $query3="
                SELECT animais.ID_pet
                FROM animais
                INNER JOIN clientes
                ON animais.ID_cli=clientes.ID_cli
                WHERE 
                    clientes.Nome_cli = '".$cli."' AND
                    animais.Nome_pet = '".$ani."';
            ";


            $rs3 = $mySQL->executeQuery($query3);
            $row3 =  mysql_fetch_row($rs3);
            $query = "INSERT INTO agenda (ID_Pet,Data_con,HIni_con,HFim_con,Preco_con,Tipo_con)
                    VALUES ('" . $row3[0] . "','" . $data . "','" . $ini . "','" . $fim. "','" . $preco . "','" . $tipo. "')";
            $mySQL->executeQuery($query);
        }
        
         
        ?>
        
            <div class="cont-centro">
                <h1>Agenda</h1>
                <div class="TabControl">
                    <div id="header">
                        <ul class="abas">
                            <li>
                                <div class="aba">
                                    <span>Banho/Tosa<span>
                                </div>
                            </li>
                            <li>
                                <div class="aba">
                                    <span>Consultas</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="content">
                        <div class="conteudo"  style="overflow: auto; max-height:300px;">
                            <table style="width:100%">
                                <tr>
                                    <th> ID </th>
                                    <th>Dia</th>
                                    <th>Inicio</th>
                                    <th>Término</th> 
                                    <th>Cliente</th>
                                    <th>Tipo</th>
                                    <th>Preço</th>
                                </tr>

                                                        <?php 
                                                          while ($row = mysql_fetch_array($rs1, MYSQL_NUM)) {
                                                          $i=0;
                                                          echo '<form method="GET" name="tabela'.$i.'">';
                                                          echo '<tr>';
                                                          echo '<td><input id="submitlink" type="submit" value="'.$row[0].'"></td>';
                                                          echo '<input type="hidden" name="id" value='.$row[0].'>';
                                                          echo '<td>' . $row[1] . '</td>';
                                                          echo '<td>' . $row[2] . '</td> ';
                                                          echo '<td>' . $row[3] . '</td>';
                                                          echo '<td>' . $row[6] . '</td>';
                                                          echo '<td>' . $row[4] . '</td>';
                                                          echo '<td>' . $row[5] . '</td>';
                                                          echo '</tr>';
                                                          echo '</form>';    
                                                          $i++;
                                                          } 
                                                        ?>
                            </table>
                        </div>
                        <div class="conteudo"  style="overflow: auto; max-height:300px;">
                            <table style="width:100%">
                                <tr>
                                    <th> ID </th>
                                    <th>Dia</th>
                                    <th>Inicio</th>
                                    <th>Término</th> 
                                    <th>Cliente</th>
                                    <th>Preço</th>
                                </tr>

                                                        <?php 
                                                          while ($roww = mysql_fetch_array($rs2, MYSQL_NUM)) {
                                                          $i=0;
                                                          echo '<form method="GET" name="tabela'.$i.'">';
                                                          echo '<tr>';
                                                          echo '<td><input id="submitlink" type="submit" value="'.$roww[0].'"></td>';
                                                          echo '<input type="hidden" name="id" value='.$roww[0].'>';
                                                          echo '<td>' . $roww[1] . '</td>';
                                                          echo '<td>' . $roww[2] . '</td> ';
                                                          echo '<td>' . $roww[3] . '</td>';
                                                          echo '<td>' . $roww[6] . '</td>';
                                                          echo '<td>' . $roww[5] . '</td>';
                                                          echo '</tr>';
                                                          echo '</form>';    
                                                          $i++;
                                                          } 
                                                        ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- FIM Abas-->
                <!-- bloco esquerda-->
                <div id="blocoRH">
                    <form method="POST" name="cadCon">
                        <div class="posi_agendar"> <h3>Agendar</h3><label>ID</label><input type='number' name='idLbl'value = "<?php echo (isset($id))?$id:'';?>"></div>
                    <div class="limpa"></div>
                    <div class="posi_agendar">
                        <div class="lblAgendar"><label class="lblCons " txt_form>Dia</label></div>
                        <div class="boxAgendar"><input name="data"type="date" class="txt_form" value = "<?php echo (isset($row8[1]))?$row8[1]:'';?>"></div>
                    </div>
                    <div class="limpa"></div>
                    <div class="posi_agendar">
                        <label class="lblCons">Inicio</label><input name="ini"type="time" class="" value = "<?php echo (isset($row8[2]))?$row8[2]:'';?>">
                        <label class="lblCons">Termino</label><input name="fim"type="time" class="" value = "<?php echo (isset($row8[3]))?$row8[3]:'';?>">
                    </div>
                    <div class="limpa"></div>
                    <div class="posi_agendar">
                        <div class="lblAgendar"><label class="lblCons">Tipo</label></div>
                        <div class="boxAgendar" >
                            <select class="txt_form" name="tipo">
                                <option value="Consulta">Consulta</option>
                                <option value="Banho/Tosa">Banho/Tosa</option>
                                <option value="Banho">Banho</option>
                                <option value="Tosa Higienica">Tosa Higienica</option>
                            </select>
                        </div>
                    </div>
                    <div class="limpa"></div>
                    <div class="posi_agendar">
                        
                        <div class="lblAgendar"><label class="lblCons">Cliente</label></div>
                        <div class="boxAgendar">
                            <?php
                                $query7 = "Select 
                                                Nome_cli
                                            FROM 
                                                clientes
                                            ORDER BY 
                                                Nome_cli; 
                                            ";
                                $rs7 = $mySQL->executeQuery($query7);
                                $rs7_totalRows = mysql_num_rows($rs7);
                                $result7 = mysql_query("$query7");
                                echo '<select class="txt_form" name="cli">';
                                while ( $row7 = mysql_fetch_array( $rs7 ) ) {
                                        echo '<option value="'.$row7[0].'">'.$row7[0].'</option>';
                                }
                                echo '</select>';
                            ?>
                        </div>
                    </div>
                    <div class="limpa"></div>
                    <div class="lblAgendar"><label class="lblCons">Animais</label></div>
                        <div class="boxAgendar" >
                            <?php
                                $query8 = "Select 
                                                Nome_pet
                                            FROM 
                                                animais
                                            ORDER BY 
                                                Nome_pet; 
                                            ";
                                $rs8 = $mySQL->executeQuery($query8);
                                $rs8_totalRows = mysql_num_rows($rs8);
                                $result8 = mysql_query("$query8");
                                echo '<select class="txt_form" name="ani">';
                                while ( $row8 = mysql_fetch_array( $rs8 ) ) {
                                        echo '<option value="'.$row8[0].'">'.$row8[0].'</option>';
                                }
                                echo '</select>';
                            ?>
                        </div>
                    
                    <div class="limpa"></div>
                    <div class="posi_agendar">
                        <input type="hidden" name="salva">
                        <button type="submit" value="new" name="btnsalva">Novo</button>
                        <button type="submit" value="ok" name="btnsalva">Salvar</button>
                        <button type="submit" value="alterar" name="alterar">Alterar</button>
                        <button type="submit" value="deletar" name="deletar" href='Consulta.php'>Deletar</button>
                        
                    </div>
                    </FORM>
                </div>
                <!--FIM bloco esquerda-->
                <!--Inicio Form-->
                <div id='form_func'>
                    <div style='clear: both; background: #0ff;'>
                            <?php
                                $query5="
                                    SELECT 
                                        clientes.Nome_cli,
                                        clientes.Tel_cli,
                                        clientes.Cel_cli,
                                        clientes.Cidade_cli,
                                        clientes.Rua_cli,
                                        clientes.Comp_cli
                                    FROM agenda
                                    INNER JOIN animais 
                                    ON agenda.ID_pet=animais.ID_pet
                                    INNER jOIN clientes
                                    ON animais.ID_cli=clientes.ID_cli
                                    WHERE 
                                    agenda.ID_con = '".$id."'; 
                                        ";
                                $rs5 = $mySQL->executeQuery($query5);
                                $row5 =  mysql_fetch_row($rs5);
                                echo 'Especificação do cliente<br>';
                                echo 'Nome:  '.$row5[0].'      Telefone: '.$row5[1].'      Celular: '.$row5[2].'<br>';
                                echo 'Cidade: '.$row5[3].'      Rua: '.$row5[4].'      Complemento: '.$row5[5].'<br>';
                            ?> 
                        </div>
                </div>
                <!--Fim Form-->

            </div>
        </div>
</BODY>

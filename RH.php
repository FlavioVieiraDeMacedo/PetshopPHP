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
        <TITLE>RH</TITLE>
    </HEAD>
    <BODY>
        <?php
        error_reporting(0);
        
        //include './Cliente.php';
        include './MySQL.php';
        $mySQL = new MySQL;
        $query1 = "Select * from funcionarios ORDER BY ID_func DESC LIMIT 30";
        $rs1 = $mySQL->executeQuery($query1);
        $rs1_totalRows = mysql_num_rows($rs1);
        $result1 = mysql_query("$query1");
        
        $query2 = "Select * from medicos ORDER BY ID_med DESC LIMIT 30";
        $rs2 = $mySQL->executeQuery($query2);
        $rs2_totalRows = mysql_num_rows($rs2);
        $result2 = mysql_query("$query2");
        //$mySQL->disconnect;
        if (isset($_GET['salva'])) {
            $nome = htmlspecialchars((empty($_GET['nome_med'])) ? '0' : $_GET['nome_med']);
            $tel = htmlspecialchars((empty($_GET['tel_med'])) ? '0' : $_GET['tel_med']);
            $cel = htmlspecialchars((empty($_GET['cel_med'])) ? '0' : $_GET['cel_med']);
            $cidade = htmlspecialchars((empty($_GET['cidade_med'])) ? '0' : $_GET['cidade_med']);
            $comp = htmlspecialchars((empty($_GET['comp_med'])) ? '0' : $_GET['comp_med']);
            $rua = htmlspecialchars((empty($_GET['rua_med'])) ? '0' : $_GET['rua_med']);
            $setor = htmlspecialchars((empty($_GET['setor_med'])) ? '0' : $_GET['setor_med']);
            $cpf = htmlspecialchars((empty($_GET['cpf_med'])) ? '0' : $_GET['cpf_med']);
            $salario = htmlspecialchars((empty($_GET['salario_med'])) ? '0' : $_GET['salario_med']);
            $dtAdm = htmlspecialchars((empty($_GET['dtAdm_med'])) ? '0' : $_GET['dtAdm_med']);
            $dtPag = htmlspecialchars((empty($_GET['dtPag_med'])) ? '0' : $_GET['dtPag_med']);
            $espec = htmlspecialchars((empty($_GET['espec_med'])) ? '0' : $_GET['espec_med']);
            $CRMV = htmlspecialchars((empty($_GET['CRMV_med'])) ? '0' : $_GET['CRMV_med']);    
    
            $mySQL = new MySQL;  
            if($setor!="Medico"){
            $query = "INSERT INTO "
                            . "funcionarios ("
                                    . "Nome_func,"
                                    . "Tel_func,"
                                    . "Cel_func,"
                                    . "Cidade_func,"
                                    . "Rua_func,"
                                    . "Comp_func,"
                                    . "Salario_func,"
                                    . "DtPag_func,"
                                    . "DtAdmissao_func,"
                                    . "CPF_func,"
                                    . "Setor_func) "
                            . "VALUES ('" 
                                    . $nome . "','" 
                                    . $tel . "','" 
                                    . $cel . "','" 
                                    . $cidade . "','" 
                                    . $rua . "','" 
                                    . $comp. "','" 
                                    . $salario. "','" 
                                    . $dtPag. "','" 
                                    . $dtAdm. "','" 
                                    . $cpf. "','" 
                                    . $setor. "')";
            $rsClientes = $mySQL->executeQuery($query);
            }else{
                $query = "INSERT INTO "
                            . "medicos ("
                                    . "Nome_med,"
                                    . "Tel_med,"
                                    . "Cel_med,"
                                    . "Cidade_med,"
                                    . "Rua_med,"
                                    . "Comp_med,"
                                    . "Salario_med,"
                                    . "DtPag_med,"
                                    . "DtAdmissao_med,"
                                    . "CPF_med,"
                                    . "Especial_med,"
                                    . "CRMV_med) "
                            . "VALUES ('" 
                                    . $nome . "','" 
                                    . $tel . "','" 
                                    . $cel . "','" 
                                    . $cidade . "','" 
                                    . $rua . "','" 
                                    . $comp. "','" 
                                    . $salario. "','" 
                                    . $dtPag. "','" 
                                    . $dtAdm. "','" 
                                    . $cpf. "','"
                                    . $espec. "','"
                                    . $CRMV. "')";
            $rsClientes = $mySQL->executeQuery($query);
                
            }
        }  
        
        ?>
        <?php
        include './Menu.php';
        ?>
            <div class="cont-centro">
                <h1>Recursos Humanos</h1>
                <!--Abas-->
                <div class="TabControl">
                    <div id="header">
                        <ul class="abas">
                            <li>
                                <div class="aba">
                                    <span>Funcionários<span>
                                            </div>
                                            </li>
                                            <li>
                                                <div class="aba">
                                                    <span>Médicos</span>
                                                </div>
                                            </li>
                                            </ul>
                                            </div>
                                            <div id="content">
                                                <div class="conteudo"  style="overflow: auto; max-height:300px;">
                                                    <table style="width:100%">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nome</th>
                                                            <th>Setor</th> 
                                                            <th>Salario</th>
                                                            <th>Data Pagamento</th>
                                                        </tr>

                                                        <?php
                                                        
                                                        while ($row = mysql_fetch_array($rs1, MYSQL_NUM)) {
                                                        echo '<tr>';
                                                        echo '<td>'.$row[1].'</td>';
                                                        echo '<td>'.$row[2].'</td> ';
                                                        echo '<td>'.$row[12].'</td>';
                                                        echo '<td>'.$row[8].'</td>';
                                                        echo '<td>'.$row[9].'</td>';
                                                        echo '</tr>';
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <div class="conteudo"  style="overflow: auto; max-height:300px;">
                                                    <table style="width:100%">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nome</th>
                                                            <th>Especialidade</th> 
                                                            <th>Salario</th>
                                                            <th>Data Pagamento</th>
                                                        </tr>

                                                        <?php
                                                        
                                                        while ($roww = mysql_fetch_array($rs2, MYSQL_NUM)) {
                                                        echo '<tr>';
                                                        echo '<td>'.$roww[1].'</td>';
                                                        echo '<td>'.$roww[2].'</td> ';
                                                        echo '<td>'.$roww[12].'</td>';
                                                        echo '<td>'.$roww[8].'</td>';
                                                        echo '<td>'.$roww[9].'</td>';
                                                        echo '</tr>';
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- FIM Abas-->
                                            <!-- bloco esquerda-->
                                            <div id="blocoRH">
                                                <h3>Funcionarios do Mes</h3>

                                            </div>
                                            <!--FIM bloco esquerda-->
                                            <!--Inicio Form-->
                                            <div id='form_func'>
                                                <form method="GET" name="cadFun">
                                                    <div style='clear: both;background: #0ff;'>
                                                        <div class="form_func1"style='background: #0f0;'>
                                                            <label>Nome</label><input name="nome_med"type="text" class="txt_form">
                                                            <label>Tel</label><input name="tel_med"type="text" class="txt_form">
                                                            <label>Cel</label><input name="cel_med"type="text" class="txt_form">
                                                            <label>Cidade</label><input name="cidade_med"type="text" class="txt_form">
                                                            <label>Rua</label><input name="rua_med"type="text" class="txt_form">
                                                            <label>Complemento</label><textarea cols="30" rows="5" name="comp_med" type="text" class="txt_form"></textarea>
                                                        </div>
                                                        <div class="form_func1" style='background: #ff0;'>
                                                            <label>Setor</label><input name="setor_med"type="text" class="txt_form">
                                                            <label>CPF</label><input name="cpf_med"type="text" class="txt_form">
                                                            <label>Salario</label><input name="salario_med"type="text" class="txt_form">
                                                            <label>DtAdmissao</label><input name="dtAdm_med"type="text" class="txt_form">
                                                            <label>DtPagamento</label><input name="dtPag_med"type="text" class="txt_form"><br>
                                                            <label>Especializacao</label><input name="espec_med"type="text" class="txt_form">
                                                            <label>CRMV</label><input name="CRMV_med"type="text" class="txt_form">   
                                                            
                                                        </div>
                                                        <div id="btnsFormcad">
                                                            <input type="hidden" name="salva">
                                                            <button type="submit" value="ok" name="btnsalva">Salvar</button>
                                                            <button type="submit" value="add" name="salvaAdd">Salvar e Add Pet</button>
                                                            <button>Limpar Campos</button>
                                                            <button>Canelar Cadastro</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Fim Form-->
                                            
                                            </div>
                                            </div>
                                            </BODY>

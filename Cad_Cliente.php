<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Clientes</title>
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
    </head>
    <body>
        <?php
        //error_reporting(0);
        include './Cliente.php';
        include './Animal.php';
        include './MySQL.php';
        $mySQL = new MySQL; 
        function cadastraNoBanco(Cliente $cli,Animal $ani1, Animal $ani2) {
            echo  $cli->getNome() . "','" . $cli->getTel() . "','" . $cli->getCel() . "','" . $cli->getCidade(). "','" . $cli->getRua() . "','" . $cli->getCompEnde();
                    
            $query = "INSERT INTO clientes (Nome_cli,Tel_cli,Cel_cli,Cidade_cli,Rua_cli,Comp_cli) VALUES ('" . $cli->getNome() . "','" . $cli->getTel() . "','" . $cli->getCel() . "','" . $cli->getCidade(). "','" . $cli->getRua() . "','" . $cli->getCompEnde(). "')";
            
             $mySQL->executeQuery($query);
            
            /*
            $query3="SELECT ID_cli FROM clientes WHERE Nome_cli='".$cli->getNome()."' and Tel_cli='".$cli->getTel()."';";
            $rs3 = $mySQL->executeQuery($query3);
            $row3 =  mysql_fetch_row($rs3);
            
            $query1 = "INSERT INTO animais (ID_cli,Nome_pet, Sexo_pet, Raca_pet, Cor_pet, Tipo_pet,Partic_pet) VALUES ('".$row3[0]."','" . $ani1->getNome() . "','" . $ani1->getSexo() . "','" . $ani1->getRaca() . "','" . $ani1->getCor(). "','" . $ani1->getTipo() . "','" . $ani1->getParticularidade(). "')";
            $rsClientes1 = $mySQL->executeQuery($query1);
            
            
            if($ani2->getNome()!='0'){
            $query2 = "INSERT INTO animais (ID_cli,Nome_pet, Sexo_pet, Raca_pet, Cor_pet, Tipo_pet,Partic_pet) VALUES ('".$row3[0]."','" . $ani2->getNome() . "','" . $ani2->getSexo() . "','" . $ani2->getRaca() . "','" . $ani2->getCor(). "','" . $ani2->getTipo() . "','" . $ani2->getParticularidade(). "')";
            $rsClientes2 = $mySQL->executeQuery($query2);
            }*/
              

           
           
            echo 'Cliente cadastrado com sucesso!!!';
            //$rsClientes_totalRows = mysql_num_rows($rsClientes);
            //$mySQL->disconnect;
        }

        if (isset($_GET['salva'])) {
            $nome = htmlspecialchars((empty($_GET['nome_cli'])) ? '0' : $_GET['nome_cli']);
            $tel = htmlspecialchars((empty($_GET['tel_cli'])) ? '0' : $_GET['tel_cli']);
            $cel = htmlspecialchars((empty($_GET['cel_cli'])) ? '0' : $_GET['cel_cli']);
            $cidade = htmlspecialchars((empty($_GET['cidade_cli'])) ? '0' : $_GET['cidade_cli']);
            $rua = htmlspecialchars((empty($_GET['rua_cli'])) ? '0' : $_GET['rua_cli']);
            $comp = htmlspecialchars((empty($_GET['comp_cli'])) ? '0' : $_GET['comp_cli']);
            $btn = htmlspecialchars((empty($_GET['salvaAdd'])) ? '0' : $_GET['salvaAdd']);
            $cli = new Cliente($nome, $tel, $cel, $cidade, $rua, $comp);
            
            
            $nomeAni1 = htmlspecialchars((empty($_GET['nomeAni1'])) ? '0' : $_GET['nomeAni1']);
            $racaAni1 = htmlspecialchars((empty($_GET['racaAni1'])) ? '0' : $_GET['racaAni1']);
            $corAni1 = htmlspecialchars((empty($_GET['corAni1'])) ? '0' : $_GET['corAni1']);
            $sexoAni1 = htmlspecialchars((empty($_GET['sexoAni1'])) ? '0' : $_GET['sexoAni1']);
            $tipoAni1 = htmlspecialchars((empty($_GET['tipoAni1'])) ? '0' : $_GET['tipoAni1']);
            $partAni1 = htmlspecialchars((empty($_GET['partAni1'])) ? '0' : $_GET['partAni1']);
            $ani1 = new Animal($nomeAni1, $racaAni1, $corAni1, $sexoAni1,$tipoAni1, $partAni1);
            
            
            $nomeAni2 = htmlspecialchars((empty($_GET['nomeAni2'])) ? '0' : $_GET['nomeAni2']);
            $racaAni2 = htmlspecialchars((empty($_GET['racaAni2'])) ? '0' : $_GET['racaAni2']);
            $corAni2 = htmlspecialchars((empty($_GET['corAni2'])) ? '0' : $_GET['corAni2']);
            $sexoAni2 = htmlspecialchars((empty($_GET['sexoAni2'])) ? '0' : $_GET['sexoAni2']);
            $tipoAni2 = htmlspecialchars((empty($_GET['tipoAni2'])) ? '0' : $_GET['tipoAni2']);
            $partAni2 = htmlspecialchars((empty($_GET['partAni2'])) ? '0' : $_GET['partAni2']);
            $ani2 = new Animal($nomeAni2, $racaAni2, $corAni2, $sexoAni2,$tipoAni2, $partAni2);
            
            cadastraNoBanco($cli,$ani1,$ani2);
        }
        $query5= "
                Select 
                    clientes.ID_cli,
                    clientes.Nome_cli,
                    clientes.Tel_cli,
                    clientes.Cel_cli,
                    clientes.Cidade_cli,
                    clientes.Rua_cli,
                    clientes.Comp_cli,
                    COUNT(clientes.ID_cli) AS QtdAnimais,
                    animais.ID_pet,
                    animais.Nome_pet,
                    animais.Sexo_pet,
                    animais.Raca_pet,
                    animais.Cor_pet,
                    animais.Tipo_pet,
                    animais.Partic_pet
                FROM clientes
                INNER JOIN animais
                ON clientes.ID_cli = animais.ID_cli;
            ";
        
           $rs5 = $mySQL->executeQuery($query5);
           $rs5_totalRows = mysql_num_rows($rs5);
           $result5 = mysql_query("$query5");
           //$somaQuery="
                
                   //";
        ?> 
        <?php
        include './Menu.php';
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
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Celular</th> 
                                    <th>Cidade</th>
                                    <th>Rua</th>
                                    <th>Complemento</th>
                                    <th>Qtd Pets</th>
                                </tr>

                                                        <?php 
                                                          while ($row = mysql_fetch_array($rs5, MYSQL_NUM)) {
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
                                                          while ($roww = mysql_fetch_array($rs5, MYSQL_NUM)) {
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
                
            <div class="cont-centro" >
                <h1>Novo Cliente</h1>
                <form method="GET" name="cadCli">

                    <div id="form_cli" class="form_cli">

                        <h2>Cliente</h2>
                        <label>Nome</label><input name="nome_cli"type="text" class="txt_form"><br>
                        <label>Tel</label><input name="tel_cli"type="text" class="txt_form"><br>
                        <label>Cel</label><input name="cel_cli"type="text" class="txt_form"> <br>
                        <label>Cidade</label><input name="cidade_cli"type="text" class="txt_form"><br>
                        <label>Rua</label><input name="rua_cli"type="text" class="txt_form"><br>
                        <label>Complemento</label><textarea name="comp_cli"cols="30" rows="5"></textarea> <br>

                    </div>

                    <div id="form_ani1" class="form_cli">

                        <h2>Animal 1</h2>
                        <label>Nome</label><input name = "nomeAni1" type="text" class="txt_form"><br>
                        <label>Raça</label><input name = "racaAni1" type="text" class="txt_form"><br>
                        <label>Cor</label><input name = "corAni1" type="text" class="txt_form"><br>
                        <label>Sexo</label><br>
                        <label>Femea</label><input type="radio" name = "sexoAni1" value="Femea">
                        <label>Macho</label><input type="radio" name = "sexoAni1" value="Macho"><br>
                        <label>Tipo</label><input type="text" class="txt_form" name = " tipoAni1"><br>
                        <label>Particularidade</label><textarea cols="30" rows="5" name="partAni1"></textarea> <br>

                    </div>
                    <div id="form_ani2" class="form_cli">

                        <h2>Animal 2</h2>
                         <label>Nome</label><input name = "nomeAni2" type="text" class="txt_form"><br>
                        <label>Raça</label><input name = "racaAni2" type="text" class="txt_form"><br>
                        <label>Cor</label><input name = "corAni2" type="text" class="txt_form"><br>
                        <label>Sexo</label><br>
                        <label>Femea</label><input type="radio" name = "sexoAni2" value="Femea">
                        <label>Macho</label><input type="radio" name = "sexoAni2"value="Macho"><br>
                        <label>Tipo</label><input type="text" class="txt_form" name = " tipoAni2"><br>
                        <label>Particularidade</label><textarea cols="30" rows="5" name = "partAni2"></textarea> <br>

                    </div>
                    <div id="btnsFormcad">
                        <input type="hidden" name="salva">
                        <button type="submit" value="ok" name="btnsalva">Salvar</button>
                        <button type="submit" value="add" name="salvaAdd">Salvar e Add Pet</button>
                        <button>Limpar Campos</button>
                        <button>Canelar Cadastro</button>
                    </div>
                </form>
            </div>
    </BODY>
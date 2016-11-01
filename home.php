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
        <TITLE>HOME</TITLE>
    </HEAD>
    <BODY>
        <?php
        error_reporting(0);
        //include './Cliente.php';
        include './MySQL.php';
            $mySQL = new MySQL;
            $query = "Select * from clientes ORDER BY ID_cli DESC LIMIT 10";
            $rsClientes = $mySQL->executeQuery($query);
            $rsClientes_totalRows = mysql_num_rows($rsClientes);
            $result = mysql_query("$query");
            //$mySQL->disconnect;
        ?>
        <?php
        include './Menu.php';
        ?>
            <div class="cont-centro">
                <h1>Painel Geral</h1>
                <!--Abas-->
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
                                                    <span>Consulta</span>
                                                </div>
                                            </li>
                                            </ul>
                                            </div>
                                            <div id="content">
                                                <div class="conteudo">

                                                    <div class="month">      
                                                        <ul>
                                                            <li class="prev">❮</li>
                                                            <li class="next">❯</li>
                                                            <li style="text-align:center">
                                                                Agosto<br>
                                                                <span style="font-size:18px">2016</span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <ul class="weekdays">
                                                        <li>Segunda</li>
                                                        <li>Terça</li>
                                                        <li>Quarta</li>
                                                        <li>Quinta</li>
                                                        <li>Sexta</li>
                                                        <li>Sabado</li>
                                                        <li>Domingo</li>
                                                    </ul>

                                                    <ul class="days">  
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                        <li>5</li>
                                                        <li>6</li>
                                                        <li>7</li>
                                                        <li>8</li>
                                                        <li>9</li>
                                                        <li class="active">10</li>
                                                        <li>11</li>
                                                        <li>12</li>
                                                        <li>13</li>
                                                        <li>14</li>
                                                        <li>15</li>
                                                        <li>16</li>
                                                        <li>17</li>
                                                        <li>18</li>
                                                        <li>19</li>
                                                        <li>20</li>
                                                        <li>21</li>
                                                        <li>22</li>
                                                        <li>23</li>
                                                        <li>24</li>
                                                        <li>25</li>
                                                        <li>26</li>
                                                        <li>27</li>
                                                        <li>28</li>
                                                        <li>29</li>
                                                        <li>30</li>
                                                        <li>31</li>
                                                    </ul>

                                                </div>
                                                <div class="conteudo">
                                                    <img src="Imagens/manutencao2.jpg">
                                                </div>
                                            </div>
                                            </div>
                                            <!-- FIM Abas-->
                                            <!-- Grafico-->
                                            <div id="blocoHome">
                                                <h3>Ultimos Clientes Adicionados</h3>
                                                <?php 
                                                while ($row = mysql_fetch_array($rsClientes, MYSQL_NUM)) {
                                                echo "<ul>
                                                <li class='li_home'>
                                                    <p class='prod_home'>ID: ".$row[1]."</p>"
                                                    . "<p class='prod_home'> Nome: ".$row[2]."</p>"
                                                    . "<p class='prod_home'> Cel: ".$row[3]."</p>
                                                </li>
                                                </ul>";
                                                }
                                                ?>
                                            </div>
                                            <!--FIM Grafico-->
                                            </div>
                                            </div>
                                            </BODY>

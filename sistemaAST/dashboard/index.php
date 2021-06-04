<?php
require('../../login/verificaAutenticacao.php');
//Verifica a sessao se foi iniciada
//Conecta no BD //require-->obrigatoriamente deve achar o arquivo
require("conexao.php");
require("../funcoes.php");

//Mostra alunos e funcionarios ativos
$somaAlunos = "select count(*) as qt_alunos from pessoa where tipoPessoa='AL' and status='1'"; //Pega a sql para contagem de alunos
$resultadoSomaAlunos = mysqli_query($conexao, $somaAlunos); //transforma string $somaAlunos em numero
$numSomaAlunos = mysqli_fetch_array($resultadoSomaAlunos); //transforma o resultado em um retorno 
$somaFuncionarios = "select count(*) as qt_funcionarios from pessoa where tipoPessoa='FN' and status='1'"; //Pega a sql para contagem de Funcionários
$resultadoSomaFuncionarios = mysqli_query($conexao, $somaFuncionarios);  //transforma string $somaFuncionarios em numero
$numSomaFuncionarios = mysqli_fetch_array($resultadoSomaFuncionarios);  //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Violão
$somaTurmaViolao = "select count(*) as idturma from matricula where idturma between 1 and 10 and status='1'"; //Pega a sql para contagem de alunos na turma de violao
$resultadoSomaTurmaViolao = mysqli_query($conexao, $somaTurmaViolao); //transforma string $somaturmaViolao em numero
$numSomaTurmaViolao = mysqli_fetch_array($resultadoSomaTurmaViolao); //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Guitarra
$somaTurmaGuitarra = "select count(*) as idturma from matricula where idturma between 11 and 20 and status='1'"; //Pega a sql para contagem de alunos na turma de Guitarra
$resultadoSomaTurmaGuitarra = mysqli_query($conexao, $somaTurmaGuitarra); //transforma string $somaturmaGuitarra em numero
$numSomaTurmaGuitarra = mysqli_fetch_array($resultadoSomaTurmaGuitarra); //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Baixo
$somaTurmaBaixo = "select count(*) as idturma from matricula where idturma between 21 and 30 and status='1'"; //Pega a sql para contagem de alunos na turma de Baixo
$resultadoSomaTurmaBaixo = mysqli_query($conexao, $somaTurmaBaixo); //transforma string $somaturmaBaixo em numero
$numSomaTurmaBaixo = mysqli_fetch_array($resultadoSomaTurmaBaixo); //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Violino
$somaTurmaViolino = "select count(*) as idturma from matricula where idturma between 31 and 40 and status='1'"; //Pega a sql para contagem de alunos na turma de violino
$resultadoSomaTurmaViolino = mysqli_query($conexao, $somaTurmaViolino); //transforma string $somaturmaViolino em numero
$numSomaTurmaViolino = mysqli_fetch_array($resultadoSomaTurmaViolino); //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Bateria
$somaTurmaBateria = "select count(*) as idturma from matricula where idturma between 41 and 50 and status='1'"; //Pega a sql para contagem de alunos na turma de Bateria
$resultadoSomaTurmaBateria = mysqli_query($conexao, $somaTurmaBateria); //transforma string $somaturmaUkulele em numero
$numSomaTurmaBateria = mysqli_fetch_array($resultadoSomaTurmaBateria); //transforma o resultado em um retorno 

//Pega a quantidade de alunos cadastrados na turma de Ukulele
$somaTurmaUkulele = "select count(*) as idturma from matricula where idturma between 51 and 60 and status='1'"; //Pega a sql para contagem de alunos na turma de Ukulele
$resultadoSomaTurmaUkulele = mysqli_query($conexao, $somaTurmaUkulele); //transforma string $somaturmaUkulele em numero
$numSomaTurmaUkulele = mysqli_fetch_array($resultadoSomaTurmaUkulele); //transforma o resultado em um retorno 

//Mostra valor total recebido 
$somaRecebimento = "select sum(valor) as qt_recebido from mensalidade where status='1' and mesReferencia='12'"; //Pega a sql para contagem de recebimento
$resultadoSomaRecebimento = mysqli_query($conexao, $somaRecebimento); //transforma string $somaRecebimento em numero
$numSomaRecebimento = mysqli_fetch_array($resultadoSomaRecebimento);  //transforma o resultado em um retorno 

//Preparação da SQL
$sql = "select mensalidade.idmatricula, mensalidade.dataRecebimento, mensalidade.valor, pessoa.nome as pessoa_nome, curso.nome as curso_nome
from mensalidade 
inner join matricula on matricula.id = mensalidade.idmatricula
inner join pessoa on pessoa.id = matricula.idpessoa
inner join turma on turma.id = matricula.idturma
inner join curso on curso.id = turma.idcurso
order by mensalidade.dataRecebimento desc
limit 5";
//Executa SQL
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" href="img/logo2.png" width="45" height="46">
    <title>Sistema AST</title>
    
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">


</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                            <!-- Logo -->
                            <b class="logo-icon">
                                <img src="img/logo3.png" width="130" height="60" style="margin-left: 40px;" alt="logo" class="light-logo" />
                            </b>
                            <!--Final Logo icon -->
                            <!-- Logo texto -->
                    <!-- Final Logo -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                   
                </div>
                <!-- Fim div Logo -->
            </nav>
        </header>
        <!-- Final Topbar header -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <aside class="left-sidebar" data-sidebarbg="skin5"><br><br>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                <i class="mdi	mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadastros.php" aria-expanded="false">
                                <i class="mdi mdi-account-card-details"></i>
                                <span class="hide-menu">Cadastros</span>
                                
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="listagens.php" aria-expanded="false">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span class="hide-menu">Listagens</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="relatorios.php" aria-expanded="false">
                                <i class="mdi mdi-file-document-box "></i>
                                <span class="hide-menu">Relatórios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="financas.php" aria-expanded="false">
                                <i class="mdi mdi-coin"></i>
                                <span class="hide-menu">Finanças</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../login/logout.php" aria-expanded="false">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">Sair</span>
                                
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Alunos cadastrados por Curso</h4>
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Curso", "Alunos", { role: "style" } ],
        ["Violão", <?php echo $numSomaTurmaViolao['idturma'] ?>, "#aff6ff"],
        ["Guitarra",<?php echo $numSomaTurmaGuitarra['idturma'] ?>, "#a2e8ff"],
        ["Baixo", <?php echo $numSomaTurmaBaixo['idturma'] ?>, "#94dbff"],
        ["Violino",<?php echo $numSomaTurmaViolino['idturma'] ?>, "#87cefa"],
        ["Bateria", <?php echo $numSomaTurmaBateria['idturma'] ?>, "#7ac1ed"],
        ["Ukulele", <?php echo $numSomaTurmaUkulele['idturma'] ?> , "color: #6cb4df"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
          
        width: 650,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title m-b-5">Mensalidade recebida nesse mês</h4><br>
                                <h3 class="font-light">R$<?php echo $numSomaRecebimento['qt_recebido'] ?>,00</h3>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0 text-center">Nossa Escola</h4><br><br>
                                <div class="m-t-30">
                                    <div class="row text-center">
                                        <div class="col-6 border-right">
                                            <h4 class="m-b-0"><?php echo $numSomaAlunos['qt_alunos'] ?></h4>
                                            <span class="font-14 text-muted">Alunos</span>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="m-b-0"><?php echo $numSomaFuncionarios['qt_funcionarios'] ?></h4>
                                            <span class="font-14 text-muted">Funcionários</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="bg-light">
  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="../cadastroPessoa.php">
            <img class="img-fluid" src="img/cadastroAlunos.png" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="../cadastroMatricula.php">
            <img class="img-fluid" src="img/cadastroMatricula.png" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="../cadastroMensalidade.php">
            <img class="img-fluid" src="img/recebimentos.png" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="../listagemRecebimento.php">
            <img class="img-fluid" src="img/ultimosRecebimentos.png" alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->
                
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body"><br>
                                <h3 class="card-title text-center">Últimas mensalidades recebidas</h3>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N° Matrícula</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data Recebimento</th>
                        <th scope="col">Curso</th>
                    </tr>
                </thead>

                <tbody style= "color: black">
                
                    <?php 
                    if(mysqli_num_rows($resultado) > 0){
                        while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                      
                            <tr>
                                <td>  <?php echo $linhas['idmatricula'] ?>  </td>
                                <td>  <?php echo $linhas['pessoa_nome'] ?>  </td>  
                                <td>  <?php echo $linhas['valor']?>  </td>
                                <td>  <?php echo converteData($linhas['dataRecebimento']) ?>  </td>
                                <td>  <?php echo $linhas['curso_nome']?>  </td>
                                


                               
                            </tr>
                          
                    <?php }} else {echo "Nenhum registro encontrado";}  ?>
    
                </tbody>
            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center">Horário das aulas</h3>
                            </div>
                            <div class="comment-widgets container" style="height:430px;">
                            <img class="img-fluid" src="img/horario.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-6 bg-white text-center"><br>
                    <div style="width:500px;"><h3>Calendário</h3><br>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var day_of_week = new Array('Dom','Seg','Ter','Qua','Qui','Sex','Sab');
var month_of_year = new Array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
 
var Calendar = new Date();
 
var year = Calendar.getYear();       // Retorna o ano
var month = Calendar.getMonth();    // Retorna mes (0-11)
var today = Calendar.getDate();     // Retorna dias (1-31)
var weekday = Calendar.getDay();   // Retorna dias (1-31)
 
var DAYS_OF_WEEK = 7;    // "constant" para o numero de dias na semana
var DAYS_OF_MONTH = 31;    // "constant" para o numero de dias no mes
var cal;    // Usado para imprimir na tela
 
Calendar.setDate(1);    // Comecar o calendario no dia '1'
Calendar.setMonth(month);    // Comecar o calendario com o mes atual
 
 
var TR_start = '<TR>';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=100><B><CENTER><br><br>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="100"><CENTER><br><br>';
var TD_end = '</CENTER></TD>';
 
cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;
 
for(index=0; index < DAYS_OF_WEEK; index++)
{
 
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
else
cal += TD_start + day_of_week[index] + TD_end;
}
 
cal += TD_end + TR_end;
cal += TR_start;
 
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;
 
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
  week_day =Calendar.getDay();
  if(week_day == 0)
  cal += TR_start;
  if(week_day != DAYS_OF_WEEK)
  {
  var day  = Calendar.getDate();
  if( today==Calendar.getDate() )
  cal += highlight_start + day + highlight_end + TD_end;
  else
  cal += TD_start + day + TD_end;
  }
  if(week_day == DAYS_OF_WEEK)
  cal += TR_end;
  }
  Calendar.setDate(Calendar.getDate()+1);
}
cal += '</TD></TR></TABLE></TABLE><br>';
 
//  MOSTRAR CALENDARIO
document.write(cal);
//  End -->
</SCRIPT>
</div>
    </div></div><br><br><br><br>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center bg-light">
                Sistema de Gerenciamento de dados do
                <a href="https://institutoast.com">Instituto AST</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Div de eventos  -->

    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="adicionaEventos.js"></script>
    
</body>

</html>
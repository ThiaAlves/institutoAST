<?php
//Conecta no BD //require-->obrigatoriamente deve achar o arquivo
require("conexao.php");

//Preparação da SQL
$sql = "select * from pessoa where tipoPessoa='AL'";
$somaAlunos = "select count(*) from pessoa where tipoPessoa='AL'";
$listaSomaAlunos = mysqli_query($conexao, $somaAlunos);
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
                            <b class="logo-icon ">
                                <img src="img/logo3.png" width="130" height="60" style="margin-left: 40px;"  alt="logo" class="light-logo" />
                            </b><br>
                            <!--Final Logo icon -->
                            <!-- Logo text -->
                            
                    <!-- ============================================================== -->
                    <!-- Final Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
        <div class="page-wrapper" style="top:-70px; z-index:100;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
 <!-- Header -->
<header class="bg-dark text-center py-5 mb-4">
  <div class="container">
    <h1 class="font-weight-light text-white text-center">Selecione a Listagem</h1>
  </div>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemPessoa.php"><img src="img/cadastroPessoa.png" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Aluno/Funcionário</h5>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemSala.php"><img src="img/cadastroSala.jpg" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Salas</h5>
        </div>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemCurso.php"><img src="img/cadastroCurso.jpg" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Cursos</h5>
        </div>
      </div>
    </div>
    <!-- Team Member 4 -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemTurma.php"><img src="img/cadastroTurma.jpg" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Turmas</h5>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemMensalidade.php"><img src="img/cadastroMensalidade.jpg" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Mensalidades</h5>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <a href="../listagemMatricula.php"><img src="img/cadastroMatricula.jpg" class="card-img-top" alt="..."></a>
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Listagem de Matrículas</h5>
        </div>
      </div>
    </div>
  </div>
  </div>

  </div>
  
  <!-- /.row -->

</div>
<!-- /.container -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
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
    <!-- All Jquery -->
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
</body>

</html>
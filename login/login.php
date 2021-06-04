<?php if (isset($_GET['msg'])) { ?>
<div class="alert alert-danger" role="alert">
<?php echo($_GET['msg']) ?>
</div>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->


    <link rel="icon" href="images/logo2.png" width="45" height="46">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
<!--===============================================================================================-->
</head>
<body>
        <header class="main_menu home_menu">
                <div class="container ">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand " href="index.html"> <img src="images/logo1.png" width="182" height="71"  alt="logo"> </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
        
                                <div class="collapse navbar-collapse main-menu-item justify-content-end"
                                    id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="../index.html">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../sobre.html">Sobre</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="../cursos.html">Cursos</a>
                                        </li>
                                        
                                        <li class="nav-item active">
                                            <a class="nav-link" href="../contato.html">Contato</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
	<div class="limiter">
		<div class="container-login100" style="background: url(images/backgroundLoginPag.jpg) no-repeat center center fixed; background-size: cover;">
			<div class="wrap-login100" >
				<form class="login100-form validate-form" name="formLogin" method="POST" action="autenticacao.php">
					<span class="login100-form-title p-b-26" style="color: black; text-shadow: black 0.1em 0.1em 0.2em">
						Bem Vindo
					</span><br><br>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Insira um Email válido ex: ab@c.d">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100" data-placeholder="Login"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Coloque a senha">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                        <input class="input100" type="password" name="senha" id="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
							<button type="submit" value="Login" name="entrar" class="login100-form-btn">Entrar</button>
						</div>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	
	

</body>
</html>
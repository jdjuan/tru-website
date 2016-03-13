<?php 
session_start();
$loginError = false;
if ( !empty($_GET)) {
	if ($_GET["logout"]) {
		session_unset(); 
		session_destroy(); 
	}
}else{
	if ( !empty($_POST)) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if (!empty($user) && !empty($pass)) {
			if ($user == "admin" && $pass == "1234") {
				$_SESSION["user"] = "admin";
				$_SESSION["pass"] = "1234";
				header("Location: aliados");
			}else{
				$loginError = true;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Administrador</title>

	<!-- Bootstrap core CSS -->
	<!-- Boostrap Styles -->
	<link href="../stylesheets/styles.css" rel="stylesheet" type="text/css" />
	<!-- Sweet Alert -->
	<script src="../bower_components/sweetalert/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="../bower_components/sweetalert/dist/sweetalert.css">

	<!-- Custom styles for this template -->
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
  	<?php 
  	if ($loginError) {
  		echo "<script>swal('Ohhh...', '¡Usuario o contraseña incorrecto!', 'error')</script>";
  	}
  	?>
  	<div class="container">
  		<form class="form-signin" method="post" action="index.php">
  			<h2 class="form-signin-heading">Ingrese aquí</h2>
  			<label for="inputEmail" class="sr-only">Usuario</label>
  			<input name="user" type="text" id="inputEmail" class="form-control" placeholder="usuario" required autofocus>
  			<label for="inputPassword" class="sr-only">Password</label>
  			<input name="pass" type="password" id="inputPassword" class="form-control" placeholder="password" required>
  			<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  		</form>

  	</div> <!-- /container -->
  </body>
  </html>
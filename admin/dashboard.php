<?php 
session_start();
if (empty($_SESSION["user"]) || empty($_SESSION["pass"])) {
	header("Location: index.php");
}else{
	session_unset(); 
	session_destroy(); 
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Administrador</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Slider</a></li>
					<li><a href="#about">Clientes</a></li>
					<li><a href="#contact">Proyectos</a></li>
					<li><a href="#contact">Aliados</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../navbar-fixed-top/">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
</body>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.min.js"></script>
</html>
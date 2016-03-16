<?php 
include dirname(__FILE__) . '/admin/Db.php';
$db = new Db();   
$rowsSlider = $db -> select("SELECT * FROM `sliders` order by orden");
$rowsProyectos = $db -> select("SELECT * FROM `proyectos` order by orden");
$rowsClientes = $db -> select("SELECT * FROM `clientes` order by orden");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta charset="UTF-8">
	<!-- FavIcon -->
	<!-- <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32"> -->
	<!-- Default Compass Styles -->
	<link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />	
	<!-- Boostrap Styles -->
	<link href="stylesheets/styles.css" rel="stylesheet" type="text/css" />
	<!-- SweetAlert Styles -->
	<link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Important Owl stylesheet -->
	<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
	<!-- Main Custom Styles -->
	<link href="stylesheets/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE]><link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css"/><![endif]-->

	<!-- Jquery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled and minified Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Sweet Alert JS -->
	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script> 
	<!-- OWL Script -->
	<script src="owl-carousel/owl.carousel.js"></script>
	<!-- Custom Javascript -->
	<script src="javascripts/main.js"></script>
</head>
<body>

	<!-- NAV BAR -->
	<div class="topMenu">
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">	
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="#">
						<a id="linkSlider" style="cursor:pointer"><img alt="TRU Digital Media" class="logo" src="images/logo.png"></a>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navLinks">
						<li class="active"><a id="linkNosotros" href="#">Filosofía</a></li>
						<li><a id="linkServicios" href="#">Servicios</a></li> 
						<li><a id="linkProyectos" href="#">Proyectos</a></li> 
						<li><a id="linkEquipo" href="#">Equipo</a></li> 
						<li><a id="linkAliados" href="#">Aliados</a></li> 
						<li><a id="linkContacto" href="#">Contacto</a></li> 
					</ul>
					<ul class="nav navbar-nav navbar-right navSocial">
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#"><span class="fa fa-play"></span></a></li>
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-vimeo"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<!--END NAV BAR -->
	<!-- SLIDER -->
	<div class="slider">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="control active"></li>
				<li data-target="#myCarousel" data-slide-to="1" class="control"></li>
				<li data-target="#myCarousel" data-slide-to="2" class="control"></li>
				<li data-target="#myCarousel" data-slide-to="3" class="control"></li>
				<li data-target="#myCarousel" data-slide-to="4" class="control"></li>
				<li data-target="#myCarousel" data-slide-to="5" class="control"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div id="slider1" class="item active"></div>
				<div id="slider2" class="item"></div>
				<div id="slider3" class="item"></div>
				<div id="slider4" class="item"></div>
				<div id="slider5" class="item"></div>
				<div id="slider6" class="item"></div>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- END OF SLIDER -->
	<!-- QUIENES SOMOS -->
	<div class="container nosotros">
		<div class="row">
			<div class="col-md-6 quienesSomosLeft">
				<img class="quienesSomosImg" src="images/filosofia1.png">
			</div>
			<div class="col-md-6 quienesSomosRight">
				<p class="quienesSomosP">
					Somos una organización encargada de contribuir de manera integral en la generación de impacto social y ambiental a partir del diseño y la planificación de ciudades sostenibles.
					En URBAN GREEN Diseñamos, planificamos y desarrollamos proyectos que generan alto valor agregado a los territorios, teniendo como base estratégica e integral la sensibilización por el manejo de los recursos naturales, la educación ambiental participativa y la planificación sostenible, promoviendo tendencias propias y diferenciadoras.
				</p>
			</div>
		</div>
	</div>
	<!-- END QUIENES SOMOS -->
	<!-- SERVICIOS -->
	<div class="container servicios">
		<div class="wrapperTitle">
			<h1 class="titleSection title">Inspiración</h1>
		</div>
		<div class="row">
			<!-- SERVICIO #1 -->
			<div class="col-md-6 servicios">
				<div class="masDiv">
					<a class="mas" id="serviciosMas1" onclick="displayServicio(1);">+</a>
				</div>
				<div id="servicio1" class="serviciosInfo">
					<div class="serviciosTitle">Construcción sostenible</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Tomamos de la arquitectura una tendencia con principios de sostenibilidad social, cultural, económica y ambiental, adecuando espacios agradables que generen soluciones óptimas y estilos de vida adaptados a las condiciones actuales.</h1>
					</div>
				</div>
				<img class="serviciosImg" onclick="displayServicio(1,this);" src="images/inspiracion1.png">
				<div id="overlay1" class="overlay green"></div>
			</div>
			<!-- END SERVICIO #1 -->

			<!-- SERVICIO #2 -->
			<div class="col-md-6 servicios">
				<div class="masDiv">
					<a class="mas" id="serviciosMas2" onclick="displayServicio(2);">+</a>
				</div>
				<div id="servicio2" class="serviciosInfo">
					<div class="serviciosTitle">Diseño sostenible</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Tomamos de la arquitectura una tendencia con principios de sostenibilidad social, cultural, económica y ambiental, adecuando espacios agradables que generen soluciones óptimas y estilos de vida adaptados a las condiciones actuales.</h1>
					</div>
				</div>
				<img class="serviciosImg" onclick="displayServicio(2);" src="images/inspiracion2.png">
				<div id="overlay2" class="overlay blue"></div>
			</div>
			<!-- END SERVICIO #2 -->
		</div>

		<div class="row">
			<!-- SERVICIO #3 -->
			<div class="col-md-6 servicios">
				<div class="masDiv">
					<a class="mas" id="serviciosMas3" onclick="displayServicio(3);">+</a>
				</div>
				<div id="servicio3" class="serviciosInfo">
					<div class="serviciosTitle">Planificación Territorial</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Tomamos de la arquitectura una tendencia con principios de sostenibilidad social, cultural, económica y ambiental, adecuando espacios agradables que generen soluciones óptimas y estilos de vida adaptados a las condiciones actuales.</h1>
					</div>
				</div>
				<img class="serviciosImg" onclick="displayServicio(3);" src="images/inspiracion3.png">
				<div id="overlay3" class="overlay blue"></div>
			</div>
			<!-- END SERVICIO #3 -->

			<!-- SERVICIO #4 -->
			<div class="col-md-6 servicios">
				<div class="masDiv">
					<a class="mas" id="serviciosMas4" onclick="displayServicio(4);">+</a>
				</div>
				<div id="servicio4" class="serviciosInfo">
					<div class="serviciosTitle">Educación ambiental</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Tomamos de la arquitectura una tendencia con principios de sostenibilidad social, cultural, económica y ambiental, adecuando espacios agradables que generen soluciones óptimas y estilos de vida adaptados a las condiciones actuales.</h1>
					</div>
				</div>
				<img class="serviciosImg" onclick="displayServicio(4);" src="images/inspiracion4.png">
				<div id="overlay4" class="overlay green"></div>
			</div>
			<!-- END SERVICIO #4 -->
		</div>
	</div>
	<!-- END SERVICIOS -->
	<!-- PROYECTOS -->
	<div class="container proyectos">
		<div class="wrapperTitle upper">
			<h1 class="titleSection title">Líneas de Negocio</h1>
		</div>
		<div id="sliderClientes" class="sliderProyectos">
			<ul id="owl-example" class="nav nav-pills owl-carousel">
				<?php
				for ($i=0; $i < count($rowsClientes); $i++) { 
					$row = $rowsClientes[$i];
					if ($i==0) {
						echo "<li class='proyecto active'><a data-toggle='pill' href='#menu".($i)."'>";
						echo "<div style=\"";
						echo "background:transparent url('admin/clientes/uploads/". $row["imagen"] ."') center top no-repeat; background-size: 9em;  -webkit-filter: grayscale(100%);  filter: grayscale(100%);";
						echo "\" class='col-md-2 col-centered proyectoImg'></div>";
						echo "</a></li>";
					}else{
						echo "<li class='proyecto'><a data-toggle='pill' href='#menu".($i)."'>";
						echo "<div style=\"";
						echo "background:transparent url('admin/clientes/uploads/". $row["imagen"] ."') center top no-repeat; background-size: 9em;  -webkit-filter: grayscale(100%);  filter: grayscale(100%);";
						echo "\" class='col-md-2 col-centered proyectoImg'></div>";
						echo "</a></li>";
					}
				}
				?>
			</ul>
			<div class="tab-content">
				<div id="menu0" class="tab-pane fade in active">
					<div class="textInside">
						<h2 class="titleTextInside">Branding</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minus veniam neque ipsam incidunt harum possimus inventore sapiente, aliquam laboriosam! Vel, eligendi provident nostrum itaque voluptate! Est totam, distinctio! Explicabo omnis labore, eveniet alias quos, libero aspernatur reiciendis. Laudantium, est.</p>
					</div>
					<div id="linea1" class="linea"></div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="textInside">
						<h2 class="titleTextInside">Branding</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minus veniam neque ipsam incidunt harum possimus inventore sapiente, aliquam laboriosam! Vel, eligendi provident nostrum itaque voluptate! Est totam, distinctio! Explicabo omnis labore, eveniet alias quos, libero aspernatur reiciendis. Laudantium, est.</p>
					</div>
					<div id="linea2" class="linea"></div>
				</div>
				<div id="menu2" class="tab-pane fade">
					<div class="textInside">
						<h2 class="titleTextInside">Branding</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minus veniam neque ipsam incidunt harum possimus inventore sapiente, aliquam laboriosam! Vel, eligendi provident nostrum itaque voluptate! Est totam, distinctio! Explicabo omnis labore, eveniet alias quos, libero aspernatur reiciendis. Laudantium, est.</p>
					</div>
					<div id="linea3" class="linea"></div>
				</div>
				<div id="menu3" class="tab-pane fade">
					<div class="textInside">
						<h2 class="titleTextInside">Branding</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minus veniam neque ipsam incidunt harum possimus inventore sapiente, aliquam laboriosam! Vel, eligendi provident nostrum itaque voluptate! Est totam, distinctio! Explicabo omnis labore, eveniet alias quos, libero aspernatur reiciendis. Laudantium, est.</p>
					</div>
					<div id="linea4" class="linea"></div>
				</div>
				<div id="menu4" class="tab-pane fade">
					<div class="textInside">
						<h2 class="titleTextInside">Branding</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus minus veniam neque ipsam incidunt harum possimus inventore sapiente, aliquam laboriosam! Vel, eligendi provident nostrum itaque voluptate! Est totam, distinctio! Explicabo omnis labore, eveniet alias quos, libero aspernatur reiciendis. Laudantium, est.</p>
					</div>
					<div id="linea5" class="linea"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END PROYECTOS -->
	<!-- NUESTRO TRABAJO -->
	<div class="container trabajos">
		<div class="wrapperTitle bottom">
			<h1 class="titleSection title">Nuestro Trabajo</h1>
		</div>
		<div class="slider">
			<div id="myCarousel2" class="carousel slide" data-ride="carousel" autoplay="false">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/trabajo1.png" alt="Chania">
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<!-- END NUESTRO TRABAJO -->
	<!-- NUESTROS CLIENTES -->
	<div class="container clientes">
		<div class="wrapperTitle down">
			<h1 class="titleSection title">Nuestros Clientes</h1>
		</div> 
		<div class="row clienteRow">
			<div class="col-md-2 cliente" id="cliente1"></div>
			<div class="col-md-2 cliente" id="cliente2"></div>
			<div class="col-md-2 cliente" id="cliente3"></div>
			<div class="col-md-2 cliente" id="cliente4"></div>
			<div class="col-md-2 cliente" id="cliente5"></div>
			<div class="col-md-2 cliente" id="cliente6"></div>
			<div class="col-md-2 cliente" id="cliente7"></div>
			<div class="col-md-2 cliente" id="cliente8"></div>
			<div class="col-md-2 cliente" id="cliente9"></div>
			<div class="col-md-2 cliente" id="cliente10"></div>
			<div class="col-md-2 cliente" id="cliente11"></div>
			<div class="col-md-2 cliente" id="cliente12"></div>
			<div class="col-md-2 cliente" id="cliente13"></div>
		</div>
	</div>
	<!-- END NUESTROS CLIENTES -->
	<!-- EQUIPO -->
	<div class="container equipo">
		<div class="wrapperTitle upper	">
			<h1 class="titleSection title">Nuestro Equipo</h1>
		</div>
		<div class="row equipoRow">
			<div id="equipo1" class="col-md-3 equipo"></div><div id="equipo2" class="col-md-3 equipo"></div><div id="equipo3" class="col-md-3 equipo"></div><div id="equipo4" class="col-md-3 equipo"></div><div id="equipo5" class="col-md-3 equipo"></div><div id="equipo6" class="col-md-3 equipo"></div><div id="equipo7" class="col-md-3 equipo"></div><div id="equipo8" class="col-md-3 equipo"></div>
		</div>
	</div>
	<!-- END EQUIPO -->
	<!-- NUESTROS ALIADOS -->
	<div class="container aliados">
		<div class="wrapperTitle down">
			<h1 class="titleSection title">Nuestros Aliados</h1>
		</div> 
		<div class="row aliadoRow">
			<div class="col-md-2 aliado" id="aliado1"></div>
			<div class="col-md-2 aliado" id="aliado2"></div>
			<div class="col-md-2 aliado" id="aliado3"></div>
		</div>
	</div>
	<!-- END NUESTROS CLIENTES -->
	<!-- CONTACTO -->
	<div class="contacto container">
		<div class="row contactoRow">
			<div class="col-md-6 columnaContacto izquierda">
				<div class="wrapTitleContacto"><h1 class="titleH1Contacto">Escríbenos.</h1></div>
				<div class="emailContacto" style="color: white;font-weight: 600;text-align: center;">comercial.urbangreen@gmail.com</div>
				<div class="contactoMoreInfo">
					<div class="col-md-4 contacto">
						<ul class="footerLi">
							<li><strong>Bogotá:</strong></li>
							<li>Tel: (57) 3206285779</li>
						</ul>
					</div>
					<div class="col-md-4 contacto">
						<ul class="footerLi">
							<li><strong>Manizales:</strong></li>
							<li>Tel: 3136494180</li>
						</ul>
					</div>
					<div class="col-md-4 contacto">
						<ul class="footerLi">
							<li><strong>Lima:</strong></li>
							<li>Tel: (51) 950 4444320</li>
						</ul>
					</div> 
				</div>
			</div>
			<div class="col-md-6 columnaContacto">
				<h1 class="titleH1Contacto derecha">Escríbenos.</h1>
				<form role="form" class="formulario" action="admin/mail.php" method="post">
					<div class="form-group">
						<input name="nombre" type="text" class="form-control" id="email" placeholder="Nombre Completo" required="">
					</div>
					<div class="form-group">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input name="telefono" type="text" class="form-control" id="email" placeholder="Teléfono" required="">
					</div>
					<div class="form-group">
						<textarea name="mensaje" class="form-control" rows="5" id="comment" placeholder="Mensaje" required=""></textarea>
					</div>
					<div class="buttonWrapper">
						<button type="submit" class="btn btn-default">ENVIAR</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END CONTACTO -->
</body>
</html>
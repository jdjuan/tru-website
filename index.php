<?php 
include dirname(__FILE__) . '/admin/Db.php';
$db = new Db();   
$rowsSlider = $db -> select("SELECT * FROM `sliders` order by orden");
$rowsLineas = $db -> select("SELECT * FROM `lineas` order by orden");
$rowsTrabajos = $db -> select("SELECT * FROM `trabajos` order by orden");
$rowsClientes = $db -> select("SELECT * FROM `clientes` order by orden");
$rowsAliados = $db -> select("SELECT * FROM `aliados` order by orden");
$rowsNosotros = $db -> select("SELECT * FROM `nosotros` order by orden");
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

	<style>
		<?php
		for ($i=0; $i < count($rowsSlider); $i++) { 
			$row=$rowsSlider[$i];
			echo "#slider".($i+1)." {background-image: url('admin/slider/uploads/".$row["imagen"]."');}";
			echo "@media (max-width: 800px) {";
			echo "#slider".($i+1)." {background-image: url('admin/slider/uploads/".$row["imagenCuadrada"]."');}";
			echo "}";
		}
		for ($i=0; $i < count($rowsLineas); $i++) { 
			$row = $rowsLineas[$i];
			echo "#linea".($i+1)."{background-image: url('admin/lineas/uploads/".$row["slide"]."');}";
			echo "@media (max-width: 1000px) { #linea".($i+1)." {background: ".$row["color"].";}}";
		}
		for ($i=0; $i < count($rowsNosotros); $i++) {
			$row = $rowsNosotros[$i];
			echo "#equipo".($i+1)."{background-image: url('admin/nosotros/uploads/".$row["imagen"]."');}";
// 			echo "@media (max-width: 1000px) { #linea".($i+1)." {background: ".$row["color"].";}}";
		}
		?>

	</style>

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
						<li class="navs active"><a id="linkNosotros" href="#">Filosofía</a></li>
						<li class="navs"><a id="linkServicios" href="#">Inspiración</a></li> 
						<li class="navs"><a id="linkProyectos" href="#">Servicios</a></li> 
						<li class="navs"><a id="linkTrabajos" href="#">Trabajos</a></li> 
						<li class="navs"><a id="linkEquipo" href="#">Equipo</a></li> 
						<li class="navs"><a id="linkContacto" href="#">Contacto</a></li> 
					</ul>
					<ul class="nav navbar-nav navbar-right navSocial">
						<li><a class="socialLink" href="https://www.facebook.com/TRUDigitalM/" target="_blank"><span class="fa fa-facebook"></span></a></li>
						<li><a class="socialLink" href="https://twitter.com/TruDigitalMedia" target="_blank"><span class="fa fa-twitter"></span></a></li>
						<li><a class="socialLink" href="https://www.behance.net/TRUDigitalMedia" target="_blank"><span class="fa fa-behance"></span></a></li>
						<li><a class="socialLink" href="https://www.instagram.com/trudigitalmedia/" target="_blank"><span class="fa fa-instagram"></span></a></li>
						<li><a class="socialLink" href="https://vimeo.com/trudigitalmedia" target="_blank"><span class="fa fa-vimeo"></span></a></li>
						<li><a class="socialLink" href="https://www.youtube.com/channel/UCtabL6elI86NL2XnbzM3yQg" target="_blank"><span class="fa fa-youtube"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<!--END NAV BAR -->
	<!-- SLIDER -->
	<div class="slider">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false"> -->
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php 
				for ($i=0; $i < count($rowsSlider); $i++) { 
					if ($i==0) {
						echo "<li data-target='#myCarousel' data-slide-to=" . $i . " class='control active'></li>";
					}else{
						echo "<li data-target='#myCarousel' data-slide-to=" . $i . " class='control'></li>";
					}
				}
				?>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php
				for ($i=0; $i < count($rowsSlider); $i++) { 
					if ($i==0) {
						echo "<div id='slider".($i+1)."' class='item active'>";
					}else{
						echo "<div id='slider".($i+1)."' class='item'>";
					}
					echo "</div>";
				}
				?>
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
					Creemos que los retos son el combustible que impulsa nuestras vidas. Cuando nos fijamos una meta, los retos se convierten en la inspiración, en el punto de partida; salimos de nuestra zona de confort, afrontamos nuestros miedos y desarrollamos nuevas habilidades. <br><br>

					Las metas alcanzadas son el conjunto de retos superados.
				</p>
			</div>
		</div>
	</div>
	<!-- END QUIENES SOMOS -->
	<!-- SERVICIOS -->
	<div class="container servicios">
		<div class="wrapperTitle serviciosTopTitle">
			<h1 class="titleSection title">Inspiración</h1>
		</div>
		<div class="row">
			<!-- SERVICIO #1 -->
			<div class="col-md-6 servicios">
				<div class="masDiv">
					<a class="mas" id="serviciosMas1" onclick="displayServicio(1);">+</a>
				</div>
				<div id="servicio1" class="serviciosInfo">
					<div class="serviciosTitle">Las ideas deben inspirar</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Las marcas crean ideas poderosas que tienen la capacidad de influir en las personas. Cuando las ideas se comunican de la forma correcta pueden cambiarlo todo.<br><br>Trabajamos con marcas que aportan positivamente al mundo; creamos publicidad que inspira. 
						</h1>
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
					<div class="serviciosTitle">Simplicidad</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">La simplicidad implica mayores recursos creativos y más horas de trabajo; sin embargo, los pequeños detalles y el deseo de las marcas de facilitar la vida a sus clientes está profundamente relacionado al éxito.<br><br>Simplificamos la comunicación para transmitir ideas claras.
						</h1>
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
					<div class="serviciosTitle">Clientes + Tru</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Manteniendo una comunicación cercana y constante podemos definir, desde el inicio, las necesidades y el mejor camino para llegar a la meta. El trabajo continuo y colaborativo nos permite agregar valor y alcanzar las expectativas de nuestros clientes.<br>Procuramos cambiar el modelo tradicional de consumo pasivo; estamos convencidos de que no se trata simplemente de obtener una aprobación final.
						</h1>
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
					<div class="serviciosTitle">Trabajar feliz es posible</div>
					<div class="serviciosText">
						<h1 class="serviciosDescription">Nuestro ambiente de trabajo dinámico y creativo, nos permite disfrutar lo que hacemos para lograr los mejores resultados.<br><br>Sabemos que no hay nada mejor que trabajar feliz..</h1>
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
		<div class="wrapperTitle proyectosTopTitle">
			<h1 class="titleSection title">Servicios</h1>
		</div>
		<div id="sliderClientes" class="sliderProyectos">
			<ul id="owl-example" class="nav nav-pills owl-carousel">
				<?php
				for ($i=0; $i < count($rowsLineas); $i++) { 
					$row = $rowsLineas[$i];
					if ($i==0) {
						echo "<li class='proyecto active'><a data-toggle='pill' href='#menu".($i)."'>";
					}else{
						echo "<li class='proyecto'><a data-toggle='pill' href='#menu".($i)."'>";
					}
					echo "<div style=\"";
					echo "background:transparent url('admin/lineas/uploads/". $row["icono"] ."') center top no-repeat; background-size: 9em;  -webkit-filter: grayscale(100%);  filter: grayscale(100%);";
					echo "\" class='col-md-2 col-centered proyectoImg'></div>";
					echo "</a></li>";
				}
				?>
			</ul>
			<div class="tab-content">
				<?php
				for ($i=0; $i < count($rowsLineas); $i++) { 
					$row = $rowsLineas[$i];
					if ($i==0) {
						echo '<div id="menu'.$i.'" class="tab-pane fade in active">';
					}else{
						echo '<div id="menu'.$i.'" class="tab-pane fade in">';
					}
					echo '<div class="textInside">';
					echo '<h2 class="titleTextInside">'.$row["titulo"].'</h2>';
					echo '<p>'.$row["descripcion"].'</p></div>';
					echo '<div id="linea'.($i+1).'" class="linea"></div></div>';
				}
				?>
			</div>
		</div>
	</div>
	<!-- END PROYECTOS -->
	<!-- NUESTRO TRABAJO -->
	<div class="container trabajos">
		<div class="wrapperTitle trabajoTopTitle">
			<h1 class="titleSection title">Nuestro Trabajo</h1>
		</div>
		<div class="slider">
			<div id="myCarousel2" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
					for ($i=0; $i < count($rowsTrabajos); $i++) { 
						if ($i==0) {
							echo '<li data-target="#myCarousel2" data-slide-to="'.$i.'" class="active control"></li>';
						}else{
							echo '<li data-target="#myCarousel2" data-slide-to="'.$i.'" class="control"></li>';
						}
					}
					?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
					for ($i=0; $i < count($rowsTrabajos); $i++) { 
						$row = $rowsTrabajos[$i];
						if ($i==0) {
							echo '<div class="item active"><img src="admin/trabajos/uploads/'.$row["imagen"].'"></div>';
						}else{
							echo '<div class="item"><img src="admin/trabajos/uploads/'.$row["imagen"].'"></div>';
						}
					}
					?>
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
		<div class="wrapperTitle clientesTopTitle">
			<h1 class="titleSection title">Nuestros Clientes</h1>
		</div> 
		<div class="row clienteRow">
			<?php
			for ($i=0; $i < count($rowsClientes); $i++) {
				$row = $rowsClientes[$i];
				echo '<a href="'.$row["url"].'" target="_blank">';
				echo '<div class="col-md-2 cliente" id="cliente'.($i+1).'" style=background-image:url(\'admin/clientes/uploads/'.$row["imagen"].'\')></div>';
				echo '</a>';
			}
			?>
		</div>
	</div>
	<!-- END NUESTROS CLIENTES -->
	<!-- EQUIPO -->
	<div class="container miembros">
		<div class="wrapperTitle equipoTopTitle">
			<h1 class="titleSection title">Nuestro Equipo</h1>
		</div>
		<div class="row equipoRow">
			<!-- #equipo$.col-md-3.equipo*8>.overlay$.overlayEquipo>.tituloEquipo{Lorem ipsum dolor.}+.descripcionEquipo{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, dolor.} -->
			<?php
			for ($i=0; $i < count($rowsNosotros); $i++) {
				$row = $rowsNosotros[$i];
				echo '<div id="equipo'.($i+1).'" class="col-md-3 equipo">';
				echo '<div class="overlay'.($i+1).' overlayEquipo">';
				echo '<div class="nombreEquipo">'.$row["nombre"].'</div>';
				echo '<div class="cargoEquipo">'.$row["cargo"].'</div>';
				echo '<div class="descripcionEquipo">'.$row["info"].'</div>';
				echo '<div class="descripcionEquipo">'.$row["correo"].'</div>';
				echo '</div></div>';
			}
			?>
		</div>
	</div>
	<!-- END EQUIPO -->
	<!-- NUESTROS ALIADOS -->
	<div class="container aliados">
		<div class="wrapperTitle aliadosTopTitle">
			<h1 class="titleSection title">Nuestros Aliados</h1>
		</div> 
		<div class="row aliadoRow">
			<?php
			for ($i=0; $i < count($rowsAliados); $i++) {
				$row = $rowsAliados[$i];
				echo '<a href="'.$row["url"].'" target="_blank">';
				echo '<div class="col-md-2 aliado" id="aliado'.($i+1).'" style=background-image:url(\'admin/aliados/uploads/'.$row["imagen"].'\')></div>';
				echo '</a>';
			}
			?>
		</div>
	</div>
	<!-- END NUESTROS ALIADOS -->
	<!-- CONTACTO -->
	<div class="container contacto">
		<div class="row contactoRow">
			<div class="col-md-6 columnaContacto izquierda">
				<div class="wrapTitleContacto"><h1 class="titleH1Contacto">Escríbenos.</h1></div>
				<div class="emailContacto" style="color: white;font-weight: 600;text-align: center;">contacto@trudigitalmedia.co</div>
				<div class="contactoMoreInfo">
					<ul class="footerLi">
						<li><strong>Manizales:</strong></li>
						<li>Tel: (57) 3177006697</li>
					</ul>
				</div>
				<br><br>
				<img class="logosEscribenos" src="images/escribenos.png" alt="">
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
				<!-- <img class="logosEscribenos2" src="images/escribenos.png" alt=""> -->
			</div>
		</div>
	</div>
	<!-- END CONTACTO -->
</body>
</html>
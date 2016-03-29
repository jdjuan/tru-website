<?php 
session_start();
if (empty($_SESSION["user"]) || empty($_SESSION["pass"])) {
	session_unset(); 
	session_destroy(); 
	header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="../../stylesheets/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../stylesheets/backend.css" rel="stylesheet">
	<!-- Jquery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled and minified Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
					<li class="active"><a href="../slider">Slider</a></li>
					<li><a href="../lineas">Lineas</a></li>
					<li><a href="../trabajos">Trabajos</a></li>
					<li><a href="../clientes">Clientes</a></li>
					<li><a href="../nosotros">Nosotros</a></li>
					<li><a href="../aliados">Aliados</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../index.php?logout=yes">Salir</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<h3>Gestión de Slider</h3>
		</div>
		<div class="row">
			<p>
				<a href="create.php" class="btn btn-success">Agregar</a>
			</p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>IMAGEN</th>
						<th>IMAGEN CUADRADA</th>
						<th>ORDEN</th>
						<th>ACCIÓN</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include dirname(__FILE__) . '/../Db.php';
					$db = new Db();   
					$rows = $db -> select("SELECT * FROM `sliders` order by orden");
					foreach ($rows as $row) {
						echo '<tr>';
						echo '<td>'. $row['id'] . '</td>';
						echo "<td><img class='backEndImage' src='uploads/". $row["imagen"] . "'></td>";
						echo "<td><img class='backEndImage' src='uploads/". $row["imagenCuadrada"] . "'></td>";
						echo '<td>'. $row['orden'] . '</td>';
						echo '<td width=250>';
						echo '<a class="btn btn-info" href="read.php?id='.$row['id'].'">Ver</a>';
						echo ' ';
						echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Modificar</a>';
						echo ' ';
						echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Eliminar</a>';
						echo '</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</div> <!-- /container -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>


<?php  

// include 'Db.php';

// // Our database object
// $db = new Db();    

// // Quote and escape form submitted values
// $name = $db -> quote("test");
// $email = $db -> quote("tes");
// // $email = $db -> quote("$_POST['email']");

// // Insert the values into the database
// $result = $db -> query("INSERT INTO `users` (`name`,`email`) VALUES (" . $name . "," . $email . ")");
// $rows = $db -> select("SELECT `name`,`email` FROM `users` WHERE id=5");
// echo $result;

?>
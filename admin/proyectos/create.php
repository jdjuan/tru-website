<?php 
include dirname(__FILE__) . '/../Validate.php';
include dirname(__FILE__) . '/../Db.php';

if ( !empty($_POST)) {
	$db = new Db();
	$tituloCorto = (!empty($_POST['tituloCorto']))?$_POST['tituloCorto']:"";
	$orden = (!empty($_POST['orden']))?$_POST['orden']:0;
	$tituloLargo = (!empty($_POST['tituloLargo']))?$_POST['tituloLargo']:"";
	$info = (!empty($_POST['info']))?$_POST['info']:"";
	$db -> query("INSERT INTO `proyectos` (`tituloCorto`,`orden`,`tituloLargo`,`info`) 
		VALUES (" . $db->quote($tituloCorto) .",
		" . $orden .",
		" . $db->quote($tituloLargo) .",
		" . $db->quote($info) .")");
	header("Location: index.php");
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
	<style type="text/css">
		.inputText{
			width: 40em;
		}
	</style>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Agregar Proyecto</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post">
				<div class="control-group">
					<label class="control-label">Titulo Corto</label>
					<div class="controls">
						<input name="tituloCorto" class="inputText" type="text" value="<?php echo !empty($tituloCorto)?$tituloCorto:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Orden</label>
					<div class="controls">
						<input name="orden" type="number" value="<?php echo !empty($orden)?$orden:0;?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Título Largo</label>
					<div class="controls">
						<input name="tituloLargo" class="inputText" type="text" value="<?php echo !empty($tituloLargo)?$tituloLargo:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Info</label>
					<div class="controls">
						<textarea name="info" rows="15" cols="70" class="inputText"> <?php echo !empty($info)?$info:'';?></textarea>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" name="submit" class="btn btn-success">Agregar</button>
					<a class="btn" href="index.php">Volver</a>
				</div>
			</form>
		</div>

	</div> <!-- /container -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>

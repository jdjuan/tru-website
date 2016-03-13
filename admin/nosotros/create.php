<?php 
include dirname(__FILE__) . '/../Validate.php';
include dirname(__FILE__) . '/../Db.php';

if ( !empty($_POST)) {
	$db = new Db();
	$validate = new Validate();
	$imagenError = null;
	$file = $_FILES["imagen"];
	$nombre = (!empty($_POST['nombre']))?$_POST['nombre']:"";
	$cargo = (!empty($_POST['cargo']))?$_POST['cargo']:"";
	$correo = (!empty($_POST['correo']))?$_POST['correo']:"";
	$info = (!empty($_POST['info']))?$_POST['info']:"";
	$orden = (!empty($_POST['orden']))?$_POST['orden']:0;
    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
	if (!$validate->isFileEmpty($file)) {
		if ($validate->validateFile($file)) {
			$db -> query("INSERT INTO `nosotros` (`nombre`,`cargo`,`correo`,`info`,`imagen`,`orden`) 
				VALUES (" . $db->quote($nombre) .",
				" . $db->quote($cargo) .",
				" . $db->quote($correo) .",
				" . $db->quote($info) .",
				" . $db->quote($fileName) .",
				" . $orden .")");
			header("Location: index.php");
		}else{
			$imagenError = $validate->getFileError();
		}
	}else{
		$imagenError = "Debe adjuntar una imagen";
	}
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
				<h3>Agregar Persona</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">
				<div class="control-group <?php echo !empty($imagenError)?'has-error':'';?>">
					<label class="control-label">Seleccione la imagen a subir: (Max 5mb - JPG - JPEG - PNG)</label>
					<div class="controls">
						<input require id="myID" name="imagen" type="file">
						<?php if (!empty($imagenError)): ?>
							<span class="help-inline"><?php echo $imagenError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<input name="nombre" class="inputText" type="text" value="<?php echo !empty($nombre)?$nombre:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Cargo</label>
					<div class="controls">
						<input name="cargo" class="inputText" type="text" value="<?php echo !empty($cargo)?$cargo:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Correo</label>
					<div class="controls">
						<input name="correo" class="inputText" type="text" value="<?php echo !empty($correo)?$correo:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Info</label>
					<div class="controls">
						<textarea name="info" rows="5" cols="70" type="text"><?php echo !empty($info)?$info:'';?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Orden</label>
					<div class="controls">
						<input name="orden" type="number" value="<?php echo !empty($orden)?$orden:0;?>">
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

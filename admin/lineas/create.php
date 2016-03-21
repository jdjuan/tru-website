<?php 
include dirname(__FILE__) . '/../Validate.php';
include dirname(__FILE__) . '/../Db.php';

if ( !empty($_POST)) {
	$db = new Db();
	$validate = new Validate();
	$iconoError = null;
	$slideError = null;
	$file = $_FILES["icono"];
	$file2 = $_FILES["slide"];
	$titulo = (!empty($_POST['titulo']))?$_POST['titulo']:'';
	$descripcion = (!empty($_POST['descripcion']))?$_POST['descripcion']:'';
	$color = (!empty($_POST['color']))?$_POST['color']:'#000';
	$orden = (!empty($_POST['orden']))?$_POST['orden']:0;
	$fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
	$fileName2 = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file2["name"]));
	if (!$validate->isFileEmpty($file)) {
		if (!$validate->isFileEmpty($file2)) {
			if ($validate->validateFile($file)) {
				if ($validate->validateFile($file2)) {
					$db -> query("INSERT INTO `lineas` (`icono`,`slide`,`titulo`,`descripcion`,`color`,`orden`) 
						VALUES (" . $db->quote($fileName) . "," . $db->quote($fileName2) . "," . $db->quote($titulo) ."," . $db->quote($descripcion) ."," . $db->quote($color) ."," . $orden .")");
					header("Location: index.php");
				}else{
					$slideError = $validate->getFileError();
				}
			}else{
				$iconoError = $validate->getFileError();
			}
		}else{
			$slideError = "Debe adjuntar una imagen";
		}
	}else{
		$iconoError = "Debe adjuntar una imagen";
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
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Agregar Línea de Negocio</h3>
			</div>
			<form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">
				<div class="control-group <?php echo !empty($iconoError)?'has-error':'';?>">
					<label class="control-label">Seleccione el ícono a subir: (Max 5mb - JPG - JPEG - PNG)</label>
					<div class="controls">
						<input require name="icono" type="file">
						<?php if (!empty($iconoError)): ?>
							<span class="help-inline"><?php echo $iconoError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="control-group <?php echo !empty($slideError)?'has-error':'';?>">
					<label class="control-label">Seleccione el slide a subir: (Max 5mb - JPG - JPEG - PNG)</label>
					<div class="controls">
						<input require name="slide" type="file">
						<?php if (!empty($slideError)): ?>
							<span class="help-inline"><?php echo $slideError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Título</label>
					<div class="controls">
						<input name="titulo" class="inputText" type="text" value="<?php echo !empty($titulo)?$titulo:'';?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="descripcion" class="inputText" rows="15" cols="70" type="text"><?php echo !empty($descripcion)?$descripcion:'';?></textarea> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Color</label>
					<div class="controls">
						<input name="color" class="inputText" type="color" value="<?php echo !empty($color)?$color:'';?>">
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

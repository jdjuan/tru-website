<?php 
include dirname(__FILE__) . '/../Validate.php';
include dirname(__FILE__) . '/../Db.php';

if ( !empty($_POST)) {
	$db = new Db();
	$validate = new Validate();
	$imagenError = null;
	$imagenCuadradaError = null;
	$file = $_FILES["imagen"];
	$file2 = $_FILES["imagenCuadrada"];
	$orden = (!empty($_POST['orden']))?$_POST['orden']:0;
	$fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
	$fileName2 = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file2["name"]));
	if (!$validate->isFileEmpty($file)) {
		if (!$validate->isFileEmpty($file2)) {
			if ($validate->validateFile($file)) {
				if ($validate->validateFile($file2)) {
					$db -> query("INSERT INTO `sliders` (`imagen`,`imagenCuadrada`,`orden`) 
						VALUES (" . $db->quote($fileName) . "," . $db->quote($fileName2) . "," . $orden .")");
					header("Location: index.php");
				}else{
					$imagenCuadradaError = $validate->getFileError();
				}
			}else{
				$imagenError = $validate->getFileError();
			}
		}else{
			$imagenCuadradaError = "Debe adjuntar una imagen";
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
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Agregar Slider</h3>
			</div>

			<form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">
				<div class="control-group <?php echo !empty($imagenError)?'has-error':'';?>">
					<label class="control-label">Seleccione la imagen a subir: (Max 5mb - JPG - JPEG - PNG)</label>
					<div class="controls">
						<input require name="imagen" type="file">
						<?php if (!empty($imagenError)): ?>
							<span class="help-inline"><?php echo $imagenError;?></span>
						<?php endif; ?>
					</div>
				</div>
				<div class="control-group <?php echo !empty($imagenCuadradaError)?'has-error':'';?>">
					<label class="control-label">Seleccione la imagen cuadrada a subir: (Max 5mb - JPG - JPEG - PNG)</label>
					<div class="controls">
						<input require name="imagenCuadrada" type="file">
						<?php if (!empty($imagenCuadradaError)): ?>
							<span class="help-inline"><?php echo $imagenCuadradaError;?></span>
						<?php endif; ?>
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

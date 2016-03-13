<?php
include dirname(__FILE__) . '/../Db.php';
include dirname(__FILE__) . '/../Validate.php';

$id = null;
$imagenError = null;
$validate = new Validate();
$db = new Db();

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}else{
    header("Location: index.php");
}

if (!empty($_POST)) {
    $file = $_FILES["imagen"];
    $nombre = (!empty($_POST['nombre']))?$_POST['nombre']:"";
    $cargo = (!empty($_POST['cargo']))?$_POST['cargo']:"";
    $correo = (!empty($_POST['correo']))?$_POST['correo']:"";
    $info = (!empty($_POST['info']))?$_POST['info']:"";
    $orden = (!empty($_POST['orden']))?$_POST['orden']:0;
    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
    if (!$validate->isFileEmpty($file)) {
        if ($validate->validateFile($file)) {
            $db -> query("UPDATE nosotros set imagen = " . $db->quote($fileName) . 
                ", nombre = " .$db->quote($nombre). 
                ", cargo = " .$db->quote($cargo). 
                ", correo = " .$db->quote($correo). 
                ", info = " .$db->quote($info). 
                ", orden = " .$orden. 
                " WHERE id = " . $id);
            header("Location: index.php");
        }else{
            $imagenError = $validate->getFileError();
        }
    }else{
        $result = $db -> query("UPDATE nosotros set 
            nombre = " .$db->quote($nombre). ",
            cargo = " .$db->quote($cargo). ",
            correo = " .$db->quote($correo). ",
            info = " .$db->quote($info). ",
            orden = " .$orden. "
            WHERE id = " . $id);
        header("Location: index.php");
    }
}

$rows = $db -> select("SELECT * FROM nosotros where id = " . $id);
$imagen = $rows[0]["imagen"];
$nombre = $rows[0]["nombre"];
$cargo = $rows[0]["cargo"];
$correo = $rows[0]["correo"];
$info = $rows[0]["info"];
$orden = $rows[0]["orden"];
    // echo '<pre>'; print_r($rows); echo '</pre>';
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
                <h3>Modificar Persona</h3>
            </div>
            <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <div class="control-group <?php echo !empty($imagenError)?'has-error':'';?>">
                    <label class="control-label">Imagen (Max 5mb - JPG - JPEG - PNG)</label>
                    <div class="controls">
                        <input require id="myID" name="imagen" type="file"><br>
                        <img class="imageFull" src="uploads/<?php echo !empty($imagen)?$imagen:'';?>">
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
                <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Modificar</button>
                    <a class="btn btn-danger" href="index.php">Volver</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>

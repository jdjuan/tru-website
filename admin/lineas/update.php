<?php
include dirname(__FILE__) . '/../Db.php';
include dirname(__FILE__) . '/../Validate.php';

$id = null;
$iconoError = null;
$slideError = null;
$validate = new Validate();
$db = new Db();

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}else{
    header("Location: index.php");
}

if (!empty($_POST)) {
    $file = $_FILES["icono"];
    $file2 = $_FILES["slide"];
    $titulo = (!empty($_POST['titulo']))?$_POST['titulo']:'';
    $descripcion = (!empty($_POST['descripcion']))?$_POST['descripcion']:'';
    $orden = (!empty($_POST['orden']))?$_POST['orden']:0;
    $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
    $fileName2 = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file2["name"]));
    if (!$validate->isFileEmpty($file)) {
        if (!$validate->isFileEmpty($file2)) {
            if ($validate->validateFile($file)) {
                if ($validate->validateFile($file2)) {
                    $db -> query("UPDATE lineas set icono = " . $db->quote($fileName) . 
                        ", slide = " .$db->quote($fileName2). 
                        ", titulo = " .$db->quote($titulo). 
                        ", descripcion = " .$db->quote($descripcion). 
                        ",  orden = " .$orden. 
                        " WHERE id = " . $id);
                    header("Location: index.php");
                }else{
                    $slideError= $validate->getFileError();
                }
            }else{
                $iconoError = $validate->getFileError();
            }
        }else{
            if ($validate->validateFile($file)) {
                $result = $db -> query("UPDATE lineas set icono = " .$db->quote($fileName). 
                    ", titulo = " .$db->quote($titulo). 
                    ", descripcion = " .$db->quote($descripcion). 
                    ", orden = " .$orden. 
                    "  WHERE id = " . $id);
                header("Location: index.php");
            }else{
                $iconoError = $validate->getFileError();
            }
        }
    }else{
        if (!$validate->isFileEmpty($file2)) {
            if ($validate->validateFile($file2)) {
                $result = $db -> query("UPDATE lineas set slide = " .$db->quote($fileName2). 
                    ", titulo = " .$db->quote($titulo). 
                    ", descripcion = " .$db->quote($descripcion). 
                    ", orden = " .$orden. 
                    "  WHERE id = " . $id);
                header("Location: index.php");
            }else{
                $slideError = $validate->getFileError();
            }
        }else{
            $result = $db -> query("UPDATE lineas set titulo = " .$db->quote($titulo). 
                ", descripcion = " .$db->quote($descripcion). 
                ", orden = " .$orden. 
                "  WHERE id = " . $id);
            header("Location: index.php");
        }
    }
}

$rows = $db -> select("SELECT * FROM lineas where id = " . $id);
$icono = $rows[0]["icono"];
$slide = $rows[0]["slide"];
$titulo = $rows[0]["titulo"];
$descripcion = $rows[0]["descripcion"];
$orden = $rows[0]["orden"];
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
                <h3>Modificar Línea de Negocio</h3>
            </div>
            <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">

                <div class="control-group <?php echo !empty($iconoError)?'has-error':'';?>">
                    <label class="control-label">Seleccione el ícono a subir: (Max 5mb - JPG - JPEG - PNG)</label>
                    <div class="controls">
                        <input require name="icono" type="file">
                        <img class="imageFull" src="uploads/<?php echo !empty($icono)?$icono:'';?>">
                        <?php if (!empty($iconoError)): ?>
                            <span class="help-inline"><?php echo $iconoError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($slideError)?'has-error':'';?>">
                    <label class="control-label">Seleccione el slide a subir: (Max 5mb - JPG - JPEG - PNG)</label>
                    <div class="controls">
                        <input require name="slide" type="file">
                        <img class="imageFull" src="uploads/<?php echo !empty($slide)?$slide:'';?>">
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

<?php
include dirname(__FILE__) . '/../Db.php';
include dirname(__FILE__) . '/../Validate.php';

$id = null;
$validate = new Validate();
$db = new Db();

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}else{
    header("Location: index.php");
}

if (!empty($_POST)) {
    $tituloCorto = (!empty($_POST['tituloCorto']))?$_POST['tituloCorto']:"";
    $orden = (!empty($_POST['orden']))?$_POST['orden']:0;
    $tituloLargo = (!empty($_POST['tituloLargo']))?$_POST['tituloLargo']:"";
    $info = (!empty($_POST['info']))?$_POST['info']:"";
    $result = $db -> query("UPDATE proyectos set 
        tituloCorto = " .$db->quote($tituloCorto). ",
        orden = " .$orden. ",
        tituloLargo = " .$db->quote($tituloLargo). ",
        info = " .$db->quote($info). "
        WHERE id = " . $id);
    header("Location: index.php");
}

$rows = $db -> select("SELECT * FROM proyectos where id = " . $id);
$tituloCorto = $rows[0]["tituloCorto"];
$orden = $rows[0]["orden"];
$tituloLargo = $rows[0]["tituloLargo"];
$info = $rows[0]["info"];
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

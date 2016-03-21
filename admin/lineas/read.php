<?php
include dirname(__FILE__) . '/../Db.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
    $db = new Db();
    $rows = $db -> select("SELECT * FROM `lineas` where id =" . $id);
    $data = $rows[0];
}else{
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
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row"><h3>Ver Línea de Negocio</h3></div>
            <div class="form-horizontal">
                <div class="control-group"><label class="control-label">ÍCONO:</label>
                    <div class="controls"><img class="imageFull" src="uploads/<?php echo $data['icono'];?>"></div>
                </div>
                <div class="control-group"><label class="control-label">SLIDE:</label>
                    <div class="controls"><img class="imageFull" src="uploads/<?php echo $data['slide'];?>"></div>
                </div>
                <div class="control-group"><label class="control-label">TÍTULO:</label>
                    <div class="controls"><label class="checkbox"><?php echo $data['titulo'];?></label></div>
                </div>
                <div class="control-group"><label class="control-label">DESCRIPCIÓN:</label>
                    <div class="controls"><label class="checkbox"><?php echo $data['descripcion'];?></label></div>
                </div>
                <div class="control-group"><label class="control-label">Orden:</label>
                    <div class="controls"><label class="checkbox"><?php echo $data['orden'];?></label></div>
                </div>
                <br>
                <div class="form-actions"><a class="btn btn-success" href="index.php">Volver</a></div>
            </div>
        </div>
    </div> <!-- /container -->
</body>
</html>
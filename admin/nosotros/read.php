<?php
include dirname(__FILE__) . '/../Db.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
    $db = new Db();
    $rows = $db -> select("SELECT * FROM `nosotros` where id =" . $id);
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
</style>
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Ver Persona</h3>
            </div>
            <div class="form-horizontal" >
              <div class="control-group">
                <label class="control-label">IMAGEN:</label>
                <div class="controls">
                    <img class="imageFull" src="uploads/<?php echo $data['imagen'];?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nombre:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['nombre'];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Cargo:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['cargo'];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Correo:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['correo'];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Info:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['info'];?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Orden:</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['orden'];?>
                    </label>
                </div>
            </div>
            <br>
            <div class="form-actions">
              <a class="btn btn-success" href="index.php">Volver</a>
          </div>
      </div>
  </div>
</div>
</body>
</html>

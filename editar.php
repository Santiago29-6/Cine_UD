<?php
session_start();
if (isset($_SESSION['usuario'])) {
  include('./class/class.php');
  $emp = new Empleados();
  if (isset($_POST['grabar']) && $_POST['grabar'] == 'si') {
    $emp->editemple($_POST['id'], $_POST['n'], $_POST['a'], $_POST['c'], $_POST['contra']);
    header('Location:administrar_empleado.php');
    exit();
  }
  //llamar la funcion ver empleados
  $reg = $emp->get_emple_id($_GET['id']);
?>
  <!doctype html>
  <html lang="es">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
-->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>
    <title>GESTION DE EMPLEADOS</title>
  </head>

  <body onload="limpiar();">
    <div class="container">
      <div class="card-body">
        <form name="form" action="editar.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <label for="id">CODIGO</label>
              <input type='hidden' name='grabar' value='si'>
              <input type="number" name="id" class="form-control" value="<?php echo $reg[0]['id']; ?>" readonly placeholder="DIGITE EL CODIGO">
            </div>
            <div class="col-md-6">
              <label for="n">NOMBRE</label>
              <input type="text" name="n" class="form-control" value="<?php echo $reg[0]['nombre']; ?>" placeholder="DIGITE EL NOMBRE">
            </div>

            <div class="col-md-6">
              <label for="a">APELLIDO</label>
              <input type="text" name="a" class="form-control" value="<?php echo $reg[0]['apellido']; ?>" placeholder="DIGITE EL APELLIDO">
            </div>
            <div class="col-md-6">
              <label for="c">CORREO</label>
              <input type="" name="c" id="c" class="form-control" value="<?php echo $reg[0]['correo']; ?>" placeholder="DIGITE LA CORREO">
            </div>
            <div class="col-md-6">
              <label for="t">CONTRASEÑA</label>
              <input type="password" name="contra" class="form-control" value="<?php echo $reg[0]['contraseña']; ?>" placeholder="DIGITE LA CONTRASEÑA">
            </div><br><br><br><br>
            <div class="col-md-8">
              <input type="submit" value="EDITAR EMPLEADO" class="btn btn-primary mb-3">
            </div>
            <!--<div class="col-md-4">
            <input type="reset" value="LIMPIAR" class="btn btn-danger mb-3">
          </div>-->
        </form>
      </div>
    </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>

  </html>
<?php
}
?>
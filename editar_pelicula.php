<?php
session_start();
if (isset($_SESSION['usuario'])) {
    include('./class/class.php');
    $admin = new Administrador();
    if (isset($_POST['grabar']) && $_POST['grabar'] == 'si') {
        $admin->editpelicula($_POST['id'], $_POST['titulo'], $_POST['clasificacion'], 
                            $_POST['duracion'], $_POST['genero'], $_POST['director']);
        header('Location:administrar_peliculas.php');
        exit();
    }
    //llamar la funcion ver peliculas
    $reg = $admin->get_pelicula_id($_GET['id']);
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
        <title>GESTION DE PELICULAS</title>
    </head>

    <body onload="limpiar();">
        <div class="container">
            <div class="card-body">
                <form name="form" action="editar_pelicula.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="id">CODIGO</label>
                            <input type='hidden' name='grabar' value='si'>
                            <input type="number" name="id" class="form-control" value="<?php echo $reg[0]['id']; ?>" readonly placeholder="DIGITE EL CODIGO">
                        </div>
                        <div class="col-md-6">
                            <label for="a">TITULO</label>
                            <input type="text" name="titulo" class="form-control" value="<?php echo $reg[0]['titulo']; ?>" placeholder="DIGITE EL TITULO">
                        </div>
                        <div class="col-md-6">
                            <label for="c">CLASIFICACIÓN</label>
                            <input type="text" name="clasificacion" class="form-control" value="<?php echo $reg[0]['clasificacion']; ?>" placeholder="DIGITE LA CLASIFICACIÓN">
                        </div>
                        <div class="col-md-6">
                            <label for="t">DURACION</label>
                            <input type="text" name="duracion" class="form-control" value="<?php echo $reg[0]['duracion']; ?>" placeholder="DIGITE LA DURACION">
                        </div>
                        <div>
                            <?php
                            $admin = new Administrador();
                            $reg = $admin->verGenero();
                            ?>
                            <label>Genero</label>
                            <select class="form-select form-select" id="genero" name="genero">
                                <option selected>SELECCIONE EL GENERO</option>
                                <?php
                                for ($i = 0; $i < count($reg); $i++) {
                                    echo "<option value='" . $reg[$i]['id_g'] . "'>" . $reg[$i]['nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php
                            $admin = new Administrador();
                            $reg = $admin->verDirector();
                            ?>
                            <label>Director</label>
                            <select class="form-select form-select" id="director" name="director">
                                <option selected>Selecione director</option>
                                <?php
                                for ($i = 0; $i < count($reg); $i++) {
                                    echo "<option value='" . $reg[$i]['id_d'] . "'>" . $reg[$i]['nombre_d'] . "</option>";
                                }
                                ?>
                            </select>
                            <br><br><br><br>
                            <div class="col-md-8">
                                <input type="submit" value="EDITAR PELICULA" class="btn btn-primary mb-3">
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
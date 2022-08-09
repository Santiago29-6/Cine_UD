<?php
    session_start();
    if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>administar pelicula</title>
</head>
<body>
    <div class="d-flex">
        <div class="card col-sm-4">
            <div class="card-body">
                <form action="./insertarPelicula.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="number" name="id_p" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Imagen:</label>
                        <input accept="image/*" type="file" multiple class="form-control" name="img_p">
                    </div>
                    <div class="form-group">
                        <label>Titulo: </label>
                        <input type="text" value="" name="txtTitulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Clasificación</label>
                        <input type="text" value="" name="txtClasificacion" class="form-control">
                    </div>
                    <div>
                        <?php
                        include('./class/class.php');
                        $admin = new Administrador();
                        $reg = $admin->verGenero();
                        ?>
                        <label>Genero</label>
                        <select class="form-select form-select" id="genero" name="genero">
                            <option selected>Selecione genero</option>
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
                    </div>
                    <div class="form-group">
                        <label>Duración</label>
                        <input type="number" name="txtDuracion" class="form-control">
                    </div>
                    <br>
                    <input type="submit" name="accion" value="Agregar" class="btn btn-primary">
                    <input type="submit" name="accion" value="Actualizar" class="btn btn-success">
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>CARATULA</th>
                        <th>CLASIFICACIÓN</th>
                        <th>GENERO</th>
                        <th>DURACIÓN</th>
                        <th>DIRECTOR</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $admin = new Administrador();
                    $reg = $admin->VerPeliculas();

                    ?>
                    <?php
                    for ($i = 0; $i < count($reg); $i++) {
                        echo "<tr> 
                                        <td>" . $reg[$i]['id'] . "</td>
                                        <td>" . $reg[$i]['titulo'] . "</td>
                                        <td>"; ?><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($reg[$i]['imagen']) . '" width="90"/>'; ?>
                    <?php echo "</td>
                                        <td>".$reg[$i]['clasificacion']."</td>
                                        <td>" . $reg[$i]['nombre'] . "</td>
                                        <td>" . $reg[$i]['duracion'] . "</td>
                                        <td>" . $reg[$i]['nombre_d'] . "</td>"
                    ?>
                        <td>
                            <a class='btn btn-outline-warning' target="_blank"
                                onclick=window.location="./editar_pelicula.php?id=<?php echo $reg[$i]['id'];?>" >EDITAR</a>
                            <a class='btn btn-outline-danger' target="_blank" 
                            onclick="eliminar_p('./eliminar_p.php?id=<?php echo $reg[$i]['id']; ?>')">BORRAR</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./js/funciones.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
    }
?>
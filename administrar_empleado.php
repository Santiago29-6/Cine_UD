<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <title>administar empleado</title>

        <script src="./js/funciones.js"></script>
    </head>

    <body>
        <div class="d-flex">
            <div class="card col-sm-4">
                <div class="card-body">
                    <form action="./insert.php" method="POST">
                        <div class="form-group">
                            <label>Id:</label>
                            <input type="text" value="" name="txtID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" value="" name="txtNombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Apellido:</label>
                            <input type="text" value="" name="txtApellido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo:</label>
                            <input type="email" value="" name="txtCorreo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" value="" name="txtContraseña" class="form-control">
                        </div>
                        <br>
                        <input type="submit" name="accion" value="Agregar" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <tbody>
                    <?php
                    include('./class/class.php');
                    $emp = new Empleados();
                    $reg = $emp->veremple();
                    ?>
                    <div class="table table-striped">
                        <table class="table table-striped table-hover id=" table_id>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <TH>NOMBRE</TH>
                                    <TH>APELLIDO</TH>
                                    <th>CORREO</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($reg); $i++) {
                                    echo "<tr>
                                            <td>" . $reg[$i]['id'] . "</td>
                                            <td>" . $reg[$i]['nombre'] . "</td>
                                            <td>" . $reg[$i]['apellido'] . "</td>
                                            <td>" . $reg[$i]['correo'] . "</td>";
                                ?>
                                    <td>
                                        <a class='btn btn-outline-warning' target="_blank" onclick=window.location="./editar.php?id=<?php echo $reg[$i]['correo']; ?>">EDITAR</a>
                                        <a class='btn btn-outline-danger' target="_blank" onclick="eliminar('./eliminar.php?id=<?php echo $reg[$i]['id']; ?>')">BORRAR</a>
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
            <script src="./sw/dist/sweetalert2.all.min.js"></script>
    </body>

    </html>
<?php
}
?>
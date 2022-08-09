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
        <div class="col-sm-8">
            <tbody>
                <?php
                include('./class/class.php');
                $usuario = new Usuario();
                $reg = $usuario->verusuario();
                ?>
                <div class="table table-striped">
                    <table class="table table-striped table-hover id=" table_id>
                        <thead>
                            <tr>
                                <th>CEDULA</th>
                                <TH>NOMBRE</TH>
                                <TH>APELLIDO</TH>
                                <TH>CORREO</TH>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <?php
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>
                                <td>" . $reg[$i]['cedula'] . "</td>
                                <td>" . $reg[$i]['nombre'] . "</td>
                                <td>" . $reg[$i]['apellido'] . "</td>
                                <td>" . $reg[$i]['correo'] . "</td>"
                        ?>
                            <td>
                                <a class='btn btn-outline-warning' target="_blank" onclick=window.location="./editar_usuario.php?id=<?php echo $reg[$i]['cedula']; ?>">EDITAR</a>
                                <a class='btn btn-outline-danger' target="_blank" onclick="eliminar_u('./eliminar_u.php?id=<?php echo $reg[$i]['cedula']; ?>')">BORRAR</a>
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
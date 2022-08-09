<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>Bienvenido usuario</h1>
        <br>
        <a class="dropdown-item" href="./saliradmid.php">Salir</a>
    </body>
    <button></button>
    </html>
<?php
}
?>
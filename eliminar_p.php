<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        include('./class/class.php');
        $admin = new Administrador();
        $admin->elipelicula($_GET['id']);
        header('Location:administrar_peliculas.php');
    }
?>

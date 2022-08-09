<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        include('./class/class.php');
        $emp = new Empleados();
        $emp->elimemple($_GET['id']);
    }
?>
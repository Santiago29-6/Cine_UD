<?php
    include('./class/class.php');
    $usuario = new Usuario();
    $usuario->insertarUsuario($_REQUEST['c'],$_REQUEST['n'],$_REQUEST['a'],$_REQUEST['co'],$_REQUEST['p']);
    header("location:./login_usuario.php")
?>
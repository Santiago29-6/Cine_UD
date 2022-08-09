<?php
include("./class/class_log.php");
$ver = new Login();
$user=$_REQUEST['usuario'];
$pass=$_REQUEST['contra'];
$ver->validarUsuario($user,$pass);
?>
<?php
include("./class/class_log.php");
$useremple=$_REQUEST['usuarioemple'];
$passemple=$_REQUEST['contraemple']; 
$ver= new Login();
$ver->validarEmpleado($useremple,$passemple);
?>
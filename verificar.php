<?php
include("./class/class_log.php");
$ver = new Login();
$user=$_REQUEST['usuarioadmin'];
$pass=$_REQUEST['contraadmin'];
$ver->validarAdmin($user,$pass);
?>
<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        include('./class/class.php');
        $admin = new Administrador();
        $image= $_FILES['img_p']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $admin->InsertarPeliculas($_REQUEST['id_p'],$imgContent,$_REQUEST['txtTitulo'],
                                $_REQUEST['txtClasificacion'],$_REQUEST['txtDuracion'],
                                $_POST['genero'],$_POST['director']);
    }

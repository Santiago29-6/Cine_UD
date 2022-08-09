<?php
    session_start();
    if(isset($_SESSION['usuario'])){
?>
<head>
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cine UD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./administrar_peliculas.php" target="myframe">Administar Pelicula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" target="myframe" href="./administrar_empleado.php" >Administar Empleado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./administrar_usuarios.php" target="myframe">Administar Usuario</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./saliradmid.php">Salir</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="m-4" style="height: 550px;">
        <iframe name="myframe" style="height: 100%; width: 100%"></iframe>
        
    </div>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
<?php
    }
?>
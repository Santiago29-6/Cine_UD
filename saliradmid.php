<body>
  <?php
  session_start();
  include('./class/class.php');
  $_SESSION['usuario'];
  session_destroy();
  /*if (isset($_REQUEST["salir"])){
    session_destroy();
    $_SESSION = array();
  }
  $_SESSION = array();
  $validado = $_SESSION["usuario"] ?? false;
  if (!$validado) {
    header("location:./principal.php");
    echo "<script> Salida(); </script>";
  }
  session_destroy();*/

  header('Location:principal.php');

  ?>
  <script src="./sw/dist/sweetalert2.all.min.js"></script>
  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/mensaje_salida.js"></script>

</body>
<?php
class Conexion
{
  public static function con()
  {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "cine_ud";
    $port = "3308";
    //realizamos la conexion a la bd
    $link = mysqli_connect($host, $user, $pass, $dbname, $port)
      or die("ERROR AL CONECTAR LA BD" . mysqli_error($link));
    //SETEAR LA bd
    mysqli_query($link, "SET NAMES 'utf8'");
    //seleccionamos la bd
    mysqli_select_db($link, $dbname)
      or die("ERROR AL SELECCIONAR LA BD" . mysqli_error($link));
    return $link;
  }
}
class Administrador
{
  private $admin;
  public function __construct()
  {
    $this->admin = array();
  }
  public function InsertarPeliculas($id, $imagen, $titulo, $clasificacion, $duracion, $id_g, $id_d)
  {
    $sql = "insert into pelicula values($id,'$imagen','$titulo','$clasificacion','$duracion',$id_g,$id_d);";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'Operacion Exitosa',
        text: 'Se inserto el empleado con id $id',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='./administar_pelicula.php';
        }
    });
    </script>";
  }
  public function elipelicula($id)
  {
    $sql = "delete from pelicula where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text : 'El usuario con id $id fue eliminado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrar_peliculas.php'  
         }
       });
     </script>";
  }
  public function editpelicula($id, $titulo, $clasificacion, $duracion, $id_g, $id_d)
  {
    $sql = "update pelicula set titulo='$titulo',clasificacion='$clasificacion',duracion='$duracion',id_genero=$id_g,id_director=$id_d where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Exito!!',
          text : 'La pelicula con id $id fuen modificado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrador_pelicula.php'  
         }
       });
     </script>";
  }
  public function verGenero()
  {
    $sql = "select * from genero";
    $res = mysqli_query(Conexion::con(), $sql);
    //recorrer la tabla empleados y almacenarla en el vector
    while ($row = mysqli_fetch_array($res)) {
      $this->admin[] = $row;
    }
    return $this->admin;
  }
  public function verDirector()
  {
    $sql = "select * from director";
    $res = mysqli_query(Conexion::con(), $sql);
    //recorrer la tabla empleados y almacenarla en el vector
    while ($row = mysqli_fetch_array($res)) {
      $this->admin[] = $row;
    }
    return $this->admin;
  }



  public function VerPeliculas()
  {
    $sql = "select pe.*,ge.nombre,di.nombre_d
             from pelicula pe join genero ge on(ge.id_g = id_genero)
                           join director di on(di.id_d = id_director)";
    $res = mysqli_query(Conexion::con(), $sql);
    while ($row = mysqli_fetch_array($res)) {
      $this->admin[] = $row;
    }
    return $this->admin;
  }
  public function get_pelicula_id($id)
  {
    $sql = "select * from pelicula where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    if ($reg = mysqli_fetch_assoc($res)) {
      $this->admin[] = $reg;
    }
    return $this->admin;
  }
  public function get_admin_id($id)
  {
    $sql = "select * from administrador where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    if ($reg = mysqli_fetch_assoc($res)) {
      $this->admin[] = $reg;
    }
    return $this->admin;
  }
  public function actuClave($clave, $correo)
  {
    $sql = ("UPDATE administrador SET contraseña='$clave' WHERE correo='" . $correo . "' ");
    $res = mysqli_query(Conexion::con(), $sql);
  }
}
class Empleados
{
  private $emple;
  public function __construct()
  {
    $this->emple = array();
  }
  //insertar empleados 

  public function insertar($id, $n, $a, $c, $contra)
  {
    $sql = "insert into empleado values($id,'$n','$a','$c','$contra')";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
     Swal.fire({
         icon: 'success',
         title: 'Operacion Exitosa',
         text: 'Se inserto el empleado con id $id',
     }).then((result)=>{
         if(result.isConfirmed){
             window.location='./administrar_empleado.php';
         }
     });
     </script>";
  }
  // Ver empleados
  public function veremple()
  {
    $sql = "select * from empleado";
    $res = mysqli_query(Conexion::con(), $sql);
    //recorrer la tabla empleados y almacenarla en el vector
    while ($row = mysqli_fetch_array($res)) {
      $this->emple[] = $row;
    }
    return $this->emple;
  }
  //editar empleados

  public function editemple($id, $n, $a, $c, $contra)
  {
    $sql = "update empleado set nombre='$n',apellido='$a',correo='$c',contraseña='$contra' where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Exito!!',
          text : 'El empleado con id $id fuen modificado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrador_empleado.php'  
         }
       });
     </script>";
  }

  public function get_emple_id($id)
  {
    $sql = "select * from empleado where correo='$id'";
    $res = mysqli_query(Conexion::con(), $sql);
    if ($reg = mysqli_fetch_assoc($res)) {
      $this->emple[] = $reg;
    }
    return $this->emple;
  }

  public function actuClave($clave, $correo)
  {
    $sql = ("UPDATE empleado SET contraseña='$clave' WHERE correo='" . $correo . "' ");
    $res = mysqli_query(Conexion::con(), $sql);
  }

  public function elimemple($id)
  {
    $sql = "delete from empleado where id=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text : 'El empleado con id $id fue eliminado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrar_empleado.php'  
         }
       });
     </script>";
  }
}
class Usuario
{
  private $usuario;
  public function __construct()
  {
    $this->usuario = array();
  }
  public function insertarUsuario($cedula, $nombre, $apellido, $correo, $contraseña)
  {
    $sql = "insert into usuario values($cedula,'$nombre','$apellido','$correo','$contraseña')";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
     Swal.fire({
         icon: 'success',
         title: 'Operacion Exitosa',
         text: 'Se inserto el usuario con id $cedula',
     }).then((result)=>{
         if(result.isConfirmed){
             window.location='./login_usuario.php';
         }
     });
     </script>";
  }
  // Ver usuario
  public function verusuario()
  {
    $sql = "select * from usuario";
    $res = mysqli_query(Conexion::con(), $sql);
    //recorrer la tabla empleados y almacenarla en el vector
    while ($row = mysqli_fetch_array($res)) {
      $this->usuario[] = $row;
    }
    return $this->usuario;
  }
  //editar usuario

  public function editusuario($id, $n, $a,$c, $contra)
  {
    $sql = "update usuario set nombre='$n',apellido='$a',correo='$c',contraseña='$contra' where cedula=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Exito!!',
          text : 'El empleado con id $id fuen modificado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrar_usuario.php'  
         }
       });
     </script>";
  }

  public function get_usuario_id($id)
  {
    $sql = "select * from usuario where correo='$id'";
    $res = mysqli_query(Conexion::con(), $sql);
    while ($row = mysqli_fetch_array($res)) {
      $this->usuario[] = $row;
    }
    return $this->usuario;
  }
  public function get_usuario($id)
  {
    $sql = "select * from usuario where cedula='$id'";
    $res = mysqli_query(Conexion::con(), $sql);
    while ($row = mysqli_fetch_array($res)) {
      $this->usuario[] = $row;
    }
    return $this->usuario;
  }
  public function actuClave($clave, $correo)
  {
    $sql = ("UPDATE usuario SET contraseña='$clave' WHERE correo='" . $correo . "' ");
    $res = mysqli_query(Conexion::con(), $sql);
  }
  public function elimusuario($id)
  {
    $sql = "delete from usuario where cedula=$id";
    $res = mysqli_query(Conexion::con(), $sql);
    echo "<script type='text/javascript'>
        Swal.fire({
          icon : 'success',
          title : 'Operacion Exitosa!!',
          text : 'El usuario con id $id fue eliminado Correctamente'
        }).then((result) => {
         if (result.isConfirmed) {
          window.location='./administrar_empleado.php'  
         }
       });
     </script>";
  }
}
?>
<script src="./js/funciones.js"></script>
<script src="./sw/dist/sweetalert2.all.min.js"></script>
<?php
session_start();
include("./class/class.php");
class Login
{
    public function validarAdmin($user, $pass)
    {
        $sql = "select * from administrador where id='$user'";
        $res = mysqli_query(Conexion::con(), $sql);
        if ($row = mysqli_fetch_array($res)) {

            $sql = "select * from administrador where id='$user' and contraseña='$pass'";
            $res = mysqli_query(Conexion::con(), $sql);
            if ($row = mysqli_fetch_array($res)) {
                //creamos la variable de sesion
                //session_start();
                $_SESSION['usuario'] = $row['id'];
                print_r($_SESSION);
                echo "<script type='text/javascript'>
                        Swal.fire({
                            icon: 'success',
                            title: 'BIENVENIDO $user',
                            text: 'Al Sistema',
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='./administrador.php';
                            }
                        });
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR!!!',
                            text: 'Usario o contraseña fallida',
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location='./principal.php';
                            }
                        });
                        </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR!!!',
                    text: 'No existe el usuario $user',
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location='./principal.php';
                    }
                });
            </script>";
        }
    }
    public function validarEmpleado($user, $pass)
    {
        $sql = "select * from empleado where correo='$user'";
        $res = mysqli_query(Conexion::con(), $sql);
        if ($row = mysqli_fetch_array($res)) {

            $sql = "select * from empleado where correo='$user' and contraseña='$pass'";
            $res = mysqli_query(Conexion::con(), $sql);
            if ($row = mysqli_fetch_array($res)) {
                //creamos la variable de sesion
                $_SESSION['usuario'] = $row['id'];
                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'success',
                        title: 'BIENVENIDO $user',
                        text: 'Al Sistema',
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location='./Butacas.php';
                        }
                    });
                    </script>";
            } else {
                    echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'ERROR!!!',
            text: 'Usario o contraseña fallida',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location='./login_empleado.php';
            }
        });
        </script>";
                }
            } else {
                echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'ERROR!!!',
            text: 'No existe el usuario $user',
        }).then((result)=>{
            if(result.isConfirmed){
                window.location='./login_empleado.php';
            }
        });
        </script>";
            }
        }
    public function validarUsuario($user, $pass)
    {
        $sql = "select * from usuario where correo='$user'";
        $res = mysqli_query(Conexion::con(), $sql);
        if ($row = mysqli_fetch_array($res)) {

            $sql = "select * from usuario where correo='$user' and contraseña='$pass'";
            $res = mysqli_query(Conexion::con(), $sql);
            if ($row = mysqli_fetch_array($res)) {
                //creamos la variable de sesion
                $_SESSION['usuario'] = $row['correo'];

                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'BIENVENIDO $user',
        text: 'Al Sistema',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='bienvenido.php';
        }
    });
    </script>";
            } else {
                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'Usario o contraseña fallida',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='login_usuario.php';
        }
    });
    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'error',
        title: 'ERROR!!!',
        text: 'No existe el usuario $user',
    }).then((result)=>{
        if(result.isConfirmed){
            window.location='login_usuario.php';
        }
    });
    </script>";
        }
    }
}
?>

<body>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
</body>
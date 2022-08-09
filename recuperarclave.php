<?php
 include('./class/class.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

$logitudPass = 8;
$miPassword = substr( md5(microtime()), 1, $logitudPass);
$clave = $miPassword;

$correo = $_REQUEST['email1'];
$usuario = new Usuario();
echo $correo;
$reg=$usuario->get_usuario_id($correo);
echo $reg[0]['correo'];
if(isset($reg[0]['correo']) && $reg[0]['correo']!=$correo){
    #header("Location:login_usuario.php?errorEmail=1");
    exit();
}else{
    $usuario->actuClave($clave,$reg[0]['correo']);
    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cine.udis@gmail.com';                     //SMTP username
        $mail->Password   = 'dnadlupdtsqzopnj';                               //SMTP password
        $mail->SMTPSecure = 'ssl'; //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('cine.udis@gmail.com', 'Mailer');
        $mail->addAddress($correo, 'Joe User');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet='UTF-8';
        $mail->Subject = 'Recuperación Contraseña CineUD';
        $mail->Body    = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <title>Recuperar Clave de Usuario</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: "Roboto", sans-serif;
                    font-size: 16px;
                    font-weight: 300;
                    color: #fff;
                    background-color:#141414;
                    line-height: 30px;
                    text-align: center;
                }
                .contenedor{
                    width: 80%;
                    min-height:auto;
                    text-align: center;
                    margin: 0 auto;
                    background: #5863F8;
                    border-top: 3px solid #E64A19;
                }
                .btnlink{
                    padding:15px 30px;
                    text-align:center;
                    background-color:#EFE9F4;
                    color: black !important;
                    font-weight: 600;
                    text-decoration: blue;
                }
                .btnlink:hover{
                    color: red !important;
                }
                .imgBanner{
                    width:100%;
                    margin-left: auto;
                    margin-right: auto;
                    display: block;
                    padding:0px;
                }
                .misection{
                    color: #fff;
                    margin: 4% 10% 2%;
                    text-align: center;
                    font-family: sans-serif;
                }
                .mt-5{
                    margin-top:50px;
                }
                .mb-5{
                    margin-bottom:50px;
                }
            </style>
        </head>
        <body>
            <div class="contenedor">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                    <tr>
                        <td style="background-color:#141414;">
                            <div class="misection">
                                <h2 style="color: #5863F8; margin: 0 0 7px">Hola, </h2>
                                <p style="margin: 2px; font-size: 18px">Te hemos creado una nueva clave temporal para que puedas iniciar sesión en el CineUD, la clave temporal es: <strong>' . $clave . '</strong> </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <a href="http://localhost/Proyecto_final/login_usuario.php" class="btnlink">Iniciar Sesión </a>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <img style="padding: 0;" src="https://www.ngenespanol.com/wp-content/uploads/2018/08/En-este-pa%C3%ADs-volver%C3%A1n-haber-cines-comerciales-despu%C3%A9s-de-30-a%C3%B1os.jpg"width="100%">
                                <p>&nbsp;</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #141414;">
                        <div class="misection">
                            <h2 style="color: #5863F8; margin: 0 0 7px">Visita Nuestro Cine</h2>
                            
                        </div>
                        <div class="mb-5 misection">  
          
                        <a href="http://localhost/Proyecto_final/principal.php" class="btnlink">Visitar CineUD</a>
                        </div>
                        </td>
                    </tr>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </table>
            </div>
        </body>
      </html>';
    
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: WebDeveloper\r\n";
        $headers .= "Reply-To: ";
        $headers .= "Return-path:";
        $headers .= "Cc:";
        $headers .= "Bcc:";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Se envio el mensaje';
    } catch (Exception $e) {
        echo "ERROR!!! No se pudo enviar el mensaje: {$mail->ErrorInfo}";
    }    
}
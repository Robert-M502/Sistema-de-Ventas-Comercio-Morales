<?php

// Dependencio/libreria "phpmailer/phpmailer": "^6.5" para enviar correos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        if (empty($_SESSION['correo'])) {
            header('Location: ' . BASE_URL);
        }
        $data['title'] = 'Tu perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION['correo']);
        $this->views->getView('principal', "perfil", $data);
    }

    public function registroDirecto() /* login.js */
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['clave'])) {
                $mensaje = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];
                $verificar = $this->model->getVerificar($correo);
                if (empty($verificar)) {
                    $token = md5($correo);
                    $hash = password_hash($clave, PASSWORD_DEFAULT); /* Encriptar la contraseña */
                    $data = $this->model->registroDirecto($nombre, $correo, $hash, $token);
                    if ($data > 0) {
                        $_SESSION['correo'] = $correo;
                        $_SESSION['nombre'] = $nombre;
                        $mensaje = array('msg' => 'Registrado con éxito', 'icono' => 'success', 'token' => $token);
                    } else {
                        $mensaje = array('msg' => 'Error al registrarse', 'icono' => 'error');
                    }
                } else {
                    $mensaje = array('msg' => 'Ya tienes una cuenta', 'icono' => 'warning');
                }
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    /* Dependencia/Libreria phpmailer para enviar correo */
    public function enviarCorreo()
    {
        if (isset($_POST['correo']) && isset($_POST['token'])) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = HOST_SMTP; /* 'smtp.example.com' */                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = USER_SMTP; /* 'user@example.com'   */                   //SMTP username
                $mail->Password   = PASS_SMTP; /* 'secret' */                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = PUERTO_SMTP; /*  465 */                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('rsebastianm1999@gmail.com', TITLE);
                $mail->addAddress($_POST['correo']);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mensaje desde el: ' . TITLE;
                $mail->Body    = 'Para verificar tu correo en nuestra plataforma online <a href="' . BASE_URL . 'clientes/verificarCorreo/' . $_POST['token'] . '">CLICK AQUÍ</a>';
                $mail->AltBody = 'GRACIAS POR LA PREFERENCIA';

                $mail->send();
                $mensaje = array('msg' => 'CORREO ENVIADO, REVISE TU   BANDEJA DE ENTRADA - SPAN', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje = array('msg' => 'ERROR AL ENVIAR CORREO: ' . $mail->ErrorInfo, 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'ERROR FATAL', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    /* Verificar el correo a traves del token enviado en el mismo correo */
    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!empty($verificar)) {
            $data = $this->model->actualizarVerify($verificar['id']);
            header('location: ' . BASE_URL . 'clientes');  /* Dirige  a la vista clientes después de la verificar desde el correo */
        }
    }
}

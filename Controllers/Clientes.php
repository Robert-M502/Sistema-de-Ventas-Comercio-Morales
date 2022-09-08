<?php
class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Tu perfil';
        $this->views->getView('principal', "perfil", $data);
    }

    public function registroDirecto() /* login.js */
    {
        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $hash = password_hash($clave, PASSWORD_DEFAULT); /* Encriptar la contraseña */
            $data = $this->model->registroDirecto($nombre, $correo, $hash);
            if ($data > 0) {
                $mensaje = array('msg' => 'Registrado con éxito', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al registrarse', 'icono' => 'error');
            }
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}

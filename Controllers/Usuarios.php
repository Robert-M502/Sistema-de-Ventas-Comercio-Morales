<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista usuarios en el administrador
    public function index()
    {
        $data['title'] = 'Usuarios';
        $this->views->getView('admin/usuarios', "index", $data);
    }

    /* Lista de usaurios */
    public function listar() /* Requerido en usuarios.js */
    {
        $data = $this->model->getUsuarios();
        echo json_encode($data);
        die();
    }

    /* Registrar un nuevo usuario */
    public function registrar() /* Requerido en usuarios.js */
    {
        if (isset($_POST['nombre'])) {
            if (empty($_POST['nombre']) || empty($_POST['apellido'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono'  => 'warning');
            } else {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];
                $hash = password_hash($clave, PASSWORD_DEFAULT);
                $data = $this->model->registrar($nombre, $apellido, $correo, $hash);
                if ($data > 0) {
                    $respuesta = array('msg' => 'Usuario registrado', 'icono'  => 'success');
                } else {
                    $respuesta = array('msg' => 'Error al registrar', 'icono'  => 'erro');
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }
}

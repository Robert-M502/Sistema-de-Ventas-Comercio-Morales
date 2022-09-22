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
        $data = $this->model->getUsuarios(1); /* El estado es igual a 1 */
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = ' <div class="d-flex">
                <button type="button" class="btn btn-primary" onclick="editUser(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="eliminarUser(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    /* Registrar usuario  y actualizar usuario */
    public function registrar() /* Requerido en usuarios.js */
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $id = $_POST['id'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if (empty($_POST['nombre']) || empty($_POST['apellido'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono'  => 'warning');
            } else {
                /* Si no existe el id se registra el usario */
                if (empty($id)) {
                    $result = $this->model->verficarCorreo($correo);
                    /* Verificar si el correo ya esta registrado */
                    if (empty($result)) {
                        $data = $this->model->registrar($nombre, $apellido, $correo, $hash);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'Usuario registrado', 'icono'  => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar', 'icono'  => 'erro');
                        }
                    } else {
                        $respuesta = array('msg' => 'El correo ya esta registrado', 'icono' => 'warning');
                    }
                    /* Se modifica el usuario si no cumple la condición */
                } else {
                    $data = $this->model->modificar($nombre, $apellido, $correo, $id);
                    if ($data == 1) {
                        $respuesta = array('msg' => 'Usuario modificado', 'icono'  => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono'  => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    /* Elimnar user */
    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'Usuario dado de baja', 'icono'  => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono'  => 'erro');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'errors');
        }
        echo json_encode($respuesta);
        die();
    }

    /* Editar Usuario */
    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

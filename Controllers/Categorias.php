<?php
class Categorias extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista usuarios en el administrador
    public function index()
    {
        $data['title'] = 'Categorias';
        $this->views->getView('admin/categorias', "index", $data);
    }

    /* Lista de categorias */
    public function listar() /* Requerido en categorias.js */
    {
        $data = $this->model->getCategorias(1); /* El estado es igual a 1 */
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = ' <img class="img-thumbnail" src="' . BASE_URL . $data[$i]['imagen'] . '" alt="' . $data[$i]['categoria'] . '" width="50">';
            $data[$i]['accion'] = ' <div class="d-flex">
                <button type="button" class="btn btn-primary" onclick="editCat(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="eliminarCat(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    /* Registrar categoria  y actualizar categoria */
    public function registrar() /* Requerido en categorias.js */
    {
        if (isset($_POST['categoria'])) {
            $categoria = $_POST['categoria'];
            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $id = $_POST['id'];
            $ruta = 'assets/img/categorias/';
            $nombreImg = date('YmdHis');
            if (empty($_POST['categoria'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono'  => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta .  $nombreImg . '.jpg';
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png'; /* img/categorias /default.png*/
                }
                /* Si no existe el id se registra el categoria */
                if (empty($id)) {
                    $result = $this->model->verficarCategoria($categoria);
                    /* Verificar si el correo ya esta registrado */
                    if (empty($result)) {
                        $data = $this->model->registrar($categoria, $destino);
                        if ($data > 0) {
                            if (!empty($imagen['name'])) {
                                move_uploaded_file($tmp_name, $destino);
                            }
                            $respuesta = array('msg' => 'Categoria registrado', 'icono'  => 'success');
                        } else {
                            $respuesta = array('msg' => 'Error al registrar', 'icono'  => 'erro');
                        }
                    } else {
                        $respuesta = array('msg' => 'El correo ya esta registrado', 'icono' => 'warning');
                    }
                    /* Se modifica el usuario si no cumple la condición */
                } else {
                    $data = $this->model->modificar($categoria, $destino, $id);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Categoria modificado', 'icono'  => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono'  => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    /* Elimnar categoria */
    public function delete($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->eliminar($idCat);
            if ($data == 1) {
                $respuesta = array('msg' => 'Categoria dado de baja', 'icono'  => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono'  => 'erro');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'errors');
        }
        echo json_encode($respuesta);
        die();
    }

    /* Editar categoria */
    public function edit($idCat)
    {
        if (is_numeric($idCat)) {
            $data = $this->model->getCategoria($idCat);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

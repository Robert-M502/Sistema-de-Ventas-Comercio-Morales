<?php
class Productos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista productos en el administrador
    public function index()
    {
        $data['title'] = 'Productos';
        $data['categorias'] = $this->model->getCategorias();
        $this->views->getView('admin/productos', "index", $data);
    }

    /* Lista de prodcutos */
    public function listar() /* Requerido en productos.js */
    {
        $data = $this->model->getProductos(1); /* El estado es igual a 1 */
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = ' <img class="img-thumbnail" src="' . BASE_URL . $data[$i]['imagen'] . '" alt="' . $data[$i]['nombre'] . '" width="50">';
            $data[$i]['accion'] = ' <div class="d-flex">
                <button type="button" class="btn btn-primary" onclick="editPro(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button> &nbsp 
                <button type="button" class="btn btn-danger" onclick="eliminarPro(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    /* Registrar y actualizar productos */
    public function registrar() /* Requerido en categorias.js */
    {
        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];
            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $id = $_POST['id'];
            $ruta = 'assets/img/productos/';
            $nombreImg = date('YmdHis');
            if (empty($nombre) || empty($precio) || empty($cantidad)) {
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
                    $data = $this->model->registrar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria);
                    if ($data > 0) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto registrado', 'icono'  => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar', 'icono'  => 'erro');
                    }
                    /* Se modifica el usuario si no cumple la condición */
                } else {
                    $data = $this->model->modificar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria, $id);
                    if ($data == 1) {
                        if (!empty($imagen['name'])) {
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto modificado', 'icono'  => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono'  => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }

    /* Elimnar producto */
    public function delete($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->eliminar($idPro);
            if ($data == 1) {
                $respuesta = array('msg' => 'Producto dado de baja', 'icono'  => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono'  => 'erro');
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'errors');
        }
        echo json_encode($respuesta);
        die();
    }

    /* Editar producto */
    public function edit($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->getProducto($idPro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}

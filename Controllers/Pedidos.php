<?php
class Pedidos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista pedidos en el panel administrativo
    public function index()
    {
        $data['title'] = 'Pedidos';
        $this->views->getView('admin/pedidos', "index", $data);
    }

    /* Lista de pedidos */
    public function listarPedidos() /* Requerido en pedidos.js */
    {
        $data = $this->model->getPedidos(1); /* 1 en proceso  */
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = ' <div class="d-flex">
                <button type="button" class="btn btn-info" onclick="cambiarProceso(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    /* Lista de pedidos */
    public function listarFinalizados() /* Requerido en pedidos.js */
    {
        $data = $this->model->getPedidos(3); /* 3 finalizado */
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = ' <div class="d-flex">
                 <button type="button" class="btn btn-danger" onclick="eliminarPro(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
             </div>';
        }
        echo json_encode($data);
        die();
    }

    public function update($idPedido)
    {
        if (is_numeric($idPedido)) {
            $data = $this->model->actualizarEstado(2, $idPedido);
            if ($data == 1) {
                $respuesta = array('msg' => 'Pedido actualizado', 'icono'  => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono'  => 'erro');
            }
            echo json_encode($respuesta);
        }
        die();
    }
}

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
}

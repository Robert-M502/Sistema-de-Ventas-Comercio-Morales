<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista principal (inicio)
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['categorias'] = $this->model->getCategorias();  //Categorias
        $data['nuevoProductos'] = $this->model->getNuevosProductos();  //Productos
        $this->views->getView('home', "index", $data);
    }
}

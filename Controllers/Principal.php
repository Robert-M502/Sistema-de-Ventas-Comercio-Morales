<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista principal (inicio)
    public function index()
    {
    }

    //Vista about (Sobre Nosotros)
    public function about()
    {
        $data['title'] = 'Sobre nosotras';
        $this->views->getView('principal', "about", $data);
    }

    //Vista shop (Nuestros productos)
    public function shop()
    {
        $data['title'] = 'Nuestros productos';
        $this->views->getView('principal', "shop", $data);
    }

    //Vista datail (Deatalles de los productos)
    public function detail($id_producto)
    {
        $data['producto'] =  $this->model->getProducto($id_producto);         /* LLamar el modelo getProducto */
        $data['title'] = $data['producto']['nombre'];                       /* Recuperar el nombre del producto en el titulo */
        $this->views->getView('principal', "detail", $data);
    }

    //Vista del contact (Contactos)
    public function contact($id_producto)
    {
        $data['title'] = 'Contáctenos';
        $this->views->getView('principal', "contact", $data);
    }
}

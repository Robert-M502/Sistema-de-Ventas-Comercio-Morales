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
        $data['title'] = 'Nuestos productos';
        $this->views->getView('principal', "shop", $data);
    }

    //Vista datail (Deatalles de los productos)
    public function detail($id_producto)
    {
        $data['title'] = '--------';
        $this->views->getView('principal', "detail", $data);
    }

    //Vista de la contact (Contactos)
    public function contact($id_producto)
    {
        $data['title'] = 'Contáctenos';
        $this->views->getView('principal', "contact", $data);
    }
}

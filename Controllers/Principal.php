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
    public function shop($page)
    {
        $pagina = (empty($page)) ? 1 : $page;     /* empty vefica si no existe $page por defecto va ser 1 o de lo contrario va ser la esa pagina*/
        $porPagina = 5;         /* Cantidiad de productos que se va mostrar */
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros productos';
        $data['productos'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
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

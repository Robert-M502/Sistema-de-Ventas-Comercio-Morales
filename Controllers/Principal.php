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
        $porPagina = 10;         /* Cantidiad de productos que se va mostrar */
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
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] =  $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre'];                     /* Recuperar el nombre del producto en el titulo */
        $this->views->getView('principal', "detail", $data);
    }

    //Vista categorias
    public function categorias($datos)
    {
        $id_categoria = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if (!empty($array[0])) {
                $id_categoria = $array[0];
            }
        }
        if (isset($array[1])) {
            if (!empty($array[1])) {
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 20;             //Cantidad de productos que se va a mostrar en la pagian de categorias
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['productos'] =  $this->model->getProductosCat($id_categoria, $desde, $porPagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] = $id_categoria;
        $this->views->getView('principal', "categorias", $data);
    }

    //Vista del contact (Contactos)
    public function contact($id_producto)
    {
        $data['title'] = 'Contáctenos';
        $this->views->getView('principal', "contact", $data);
    }

    //Vista lista de deseos
    public function deseo($id_producto)
    {
        $data['title'] = 'Tu lista de deseos';
        $this->views->getView('principal', "deseo", $data);
    }
}

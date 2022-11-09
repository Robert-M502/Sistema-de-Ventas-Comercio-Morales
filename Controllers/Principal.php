<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    //Vista about (Sobre Nosotros)
    public function about()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Sobre nosotras';
        $this->views->getView('principal', "about", $data);
    }

    //Vista shop (Nuestros productos)
    public function shop($page)
    {
        $data['perfil'] = 'no';
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

    //Vista datail (Detalles de los productos)
    public function detail($id_producto)
    {
        $data['perfil'] = 'no';
        $data['producto'] =  $this->model->getProducto($id_producto);         /* LLamar el modelo getProducto */
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] =  $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        $data['title'] = $data['producto']['nombre'];                     /* Recuperar el nombre del producto en el titulo */
        $this->views->getView('principal', "detail", $data);
    }

    //Vista categorias
    public function categorias($datos)
    {
        $data['perfil'] = 'no';
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
        $porPagina = 5;             //Cantidad de productos que se va a mostrar en la pagian de categorias
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
        $data['perfil'] = 'no';
        $data['title'] = 'Contáctenos';
        $this->views->getView('principal', "contact", $data);
    }

    //Vista lista de deseos
    public function deseo($id_producto)
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Lista de deseos';
        $this->views->getView('principal', "deseo", $data);
    }

    public function listaProductos()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $producto) {
                $result = $this->model->getProducto($producto['idProducto']); /* El idproducto se recupera desde el json */
                $data['id'] = $result['id'];
                $data['nombre'] = $result['nombre'];
                $data['precio'] = $result['precio'];
                $data['cantidad'] = $producto['cantidad']; /* La cantidad se recupera desde el json */
                $data['imagen'] = $result['imagen'];
                $subTotal = $result['precio'] * $producto['cantidad'];
                $data['subTotal'] = number_format($subTotal, 2);
                array_push($array['productos'], $data);
                $total += $subTotal;
            }
        }
        $array['total'] = number_format($total, 2);
        $modenaGT = 7.74;
        $TotalUSD = $total / $modenaGT;
        $array['totalPaypal'] = number_format($TotalUSD, 2, '.', ''); /* Total a pagar que recibe paypal */
        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }

    /* Busqueda productos */
    public function busqueda($valor) /* Requerido en login.js */
    {
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}

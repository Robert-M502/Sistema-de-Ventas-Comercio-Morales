<?php
class PrincipalModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    //Más detalles de un producto seleccionado
    public function getProducto($id_producto)   //recibe el parametro id_producto
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id = $id_producto";  /* Recuperar el nombre de la categoria */
        return $this->select($sql);
    }
}

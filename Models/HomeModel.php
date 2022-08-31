<?php
class HomeModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()  //funcion para obetener las categorias
    {
        $sql = "SELECT * FROM categorias";      //Cosulta sql 
        return $this->selectAll($sql);         //selectAll = metodo de la clase Query
    }

    public function getNuevosProductos()  //funcion para obetener productos
    {
        $sql = "SELECT * FROM productos ORDER BY id DESC LIMIT 12";      //Cosulta sql 
        return $this->selectAll($sql);         //selectAll = metodo de la clase Query
    }
}

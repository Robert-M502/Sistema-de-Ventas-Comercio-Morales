<?php
class AdminModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Devuelve el registro que concide con el correo */
    public function getUsuario($correo)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";      //Cosulta sql 
        return $this->select($sql);
    }

    /* Totales de los pedidos de cada estados */
    public function getTotales($estado)
    {
        $sql = "SELECT COUNT(*) AS total FROM pedidos WHERE proceso = $estado";      //Cosulta sql 
        return $this->select($sql);
    }

    public function getProductos()
    {
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE estado = 1";      //Cosulta sql 
        return $this->select($sql);
    }
}

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
}

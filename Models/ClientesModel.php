<?php
class ClientesModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Registrar cliente */
    public function registroDirecto($nombre, $correo, $clave)
    {
        $sql = "INSERT  INTO clientes (nombre, correo, clave) VALUES (?,?,?)";
        $datos = array($nombre, $correo, $clave);
        $data = $this->insertar($sql, $datos);
        /* Verificar si devuelve el id */
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }
}

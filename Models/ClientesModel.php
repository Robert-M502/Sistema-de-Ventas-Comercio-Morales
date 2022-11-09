<?php
class ClientesModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Registrar cliente */
    public function registroDirecto($nombre, $correo, $clave, $token)
    {
        $sql = "INSERT  INTO clientes (nombre, correo, clave, token) VALUES (?,?,?,?)";
        $datos = array($nombre, $correo, $clave, $token);
        $data = $this->insertar($sql, $datos);
        /* Verificar si devuelve el id */
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getToken($token)
    {
        $sql = "SELECT * FROM clientes WHERE token = '$token'";      //Cosulta sql 
        return $this->select($sql);         //select = metodo de la clase Query
    }

    /* Actualizar el token y verify en la base de datos caundo el usuairo ya esta verificado */
    public function actualizarVerify($id)
    {
        $sql = "UPDATE clientes SET token=?, verify=? WHERE id=?";
        $datos = array(null, 1, $id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getVerificar($correo)
    {
        $sql = "SELECT * FROM clientes WHERE correo = '$correo'";      //Cosulta sql 
        return $this->select($sql);         //select = metodo de la clase Query
    }

    /* Registrar pedidos */
    public function registrarPedido($id_transaccion, $monto, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user)
    {
        $sql = "INSERT  INTO pedidos (id_transaccion, monto, estado, fecha, email, nombre, apellido, direccion, ciudad, email_user) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $datos = array($id_transaccion, $monto, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user);
        $data = $this->insertar($sql, $datos);
        /* Verificar si devuelve el id */
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getProducto($id_producto)   //recibe el parametro id_producto
    {
        $sql = "SELECT * FROM productos WHERE id = $id_producto";
        return $this->select($sql);
    }

    /* Registrar detalle de pedidos */
    public function registrarDetalle($producto, $precio, $cantidad, $id_pedido)
    {
        $sql = "INSERT  INTO detalle_pedidos (producto, precio, cantidad, id_pedido) VALUES (?,?,?,?)";
        $datos = array($producto, $precio, $cantidad, $id_pedido);
        $data = $this->insertar($sql, $datos);
        /* Verificar si devuelve el id */
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getPedidos()
    {
        $sql = "SELECT * FROM pedidos";
        return $this->selectAll($sql);
    }

    public function getPedido($idPedido)
    {
        $sql = "SELECT * FROM pedidos WHERE id = $idPedido";
        return $this->select($sql);
    }

    public function verPedidos($idPedido)
    {
        $sql = "SELECT d.* FROM pedidos p INNER JOIN detalle_pedidos d ON p.id = d.id_pedido WHERE p.id = $idPedido";
        return $this->selectAll($sql);
    }
}

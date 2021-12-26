<?php
class ComprasModel extends Query{
   
    
    public function _constructor()
    {
        parent::__construct();

    }
    public function getClientes()
    {
        $sql ="select * from clientes where estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProCod(string $cod)
    {
        $sql ="select * from productos where codigo = '$cod'";
        $data = $this->select($sql);
        return $data;
    }
    
    public function getProductos(int $id)
    {
        $sql ="select * from productos where id = $id";
        $data = $this->select($sql);
        return $data;
    }
    
    public function registrarDetalle(string $table, int $id_producto, int $id_usuario, String $precio, int $cantidad, String $sub_total)
    {
        $sql ="INSERT INTO $table (id_producto, id_usuario, precio, cantidad, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    
    public function getDetalle(string $table,int $id)
    {
        $sql ="SELECT d.*, p.id AS id_pro, p.descripcion from $table d INNER JOIN productos p ON d.id_producto = p.id where d.id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data; 
    }
    public function calcularCompra(string $table,int $id_usuario)
    {
        $sql ="SELECT sub_total, SUM(sub_total) AS total FROM $table WHERE id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data; 
    }
    public function deleteDetalle(string $table, int $id){
        $sql ="DELETE FROM $table WHERE id= ?";
        $datos = array($id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    ///metodo para aumentar la cant de un producto - NuevaCompra
    public function consultarDetalle(string $table,int $id_producto, int $id_usuario)
    {
        $sql =" SELECT * FROM $table WHERE id_producto = $id_producto AND id_usuario = $id_usuario ";
        $data = $this->select($sql);
        return $data; 
    }

    public function actualizarDetalle(String $table,String $precio, int $cantidad, String $sub_total, int $id_producto, int $id_usuario)
    {
        $sql ="UPDATE $table SET precio = ?, cantidad = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ?";
        $datos = array($precio, $cantidad, $sub_total, $id_producto, $id_usuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function registrarCompra(string $total)
    {
        $sql ="INSERT INTO compras (total) VALUES (?)";
        $datos = array($total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function getId(string $table) {
        $sql = "SELECT MAX(id) AS id FROM $table";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarDetalleCompra(int $id_compra, int $id_producto, int $cantidad, string $precio, string $sub_total)
    {
        $sql ="INSERT INTO detalle_compras (id_compra, id_producto, cantidad, precio, sub_total) VALUES (?, ?, ?, ?, ?)";
        $datos = array($id_compra, $id_producto, $cantidad, $precio, $sub_total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function registrarDetalleVenta(int $id_venta, int $id_producto, int $cantidad, string $precio, string $sub_total)
    {
        $sql ="INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio, sub_total) VALUES (?, ?, ?, ?, ?)";
        $datos = array($id_venta, $id_producto, $cantidad, $precio, $sub_total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function getEmpresa()
    {
        $sql = "SELECT * FROM configuracion";
        $data = $this->select($sql);
        return $data;
    }
//..
    public function vaciarDetalle(string $table, int $id_usuario)
    {
        $sql ="DELETE FROM $table WHERE id_usuario = ?";
        $datos = array($id_usuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function getProCompra(int $id_compra )
    {
        $sql = "SELECT c.*, d.*, p.id, p.descripcion FROM compras c INNER JOIN detalle_compras d ON c.id = d.id_compra INNER JOIN productos p ON p.id = d.id_producto WHERE c.id = $id_compra";
        $data = $this->selectAll($sql);
        return $data;

    }
    public function getProVenta(int $id_venta )
    {
        $sql = "SELECT v.*, d.*, p.id, p.descripcion FROM ventas v INNER JOIN detalle_ventas d ON v.id = d.id_venta INNER JOIN productos p ON p.id = d.id_producto WHERE v.id = $id_venta";
        $data = $this->selectAll($sql);
        return $data;

    }
    public function getReportecompras()
    {
        $sql = "SELECT * FROM compras";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getReporteVentas()
    { 
        $sql = "SELECT c.id, c.nombre, v.* FROM clientes c INNER JOIN ventas v ON v.id_cliente = c.id";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function actualizarStock(int $cantidad, int $id_pro)
    {
        $sql ="update productos set cantidad = ? where id=?";
        $datos = array($cantidad, $id_pro);
        $data = $this->save($sql,$datos);
        return $data;
    }

    public function registrarVenta(int $id_cliente, string $total)
    {
        $sql ="INSERT INTO ventas (id_cliente, total) VALUES (?,?)";
        $datos = array($id_cliente, $total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function clientesVenta($id)
    {
        $sql = "SELECT v.id, v.id_cliente, c.* FROM ventas v INNER JOIN clientes c ON c.id = v.id_cliente WHERE v.id = $id";
        $data = $this->select($sql);
        return $data;
    }

    public function verificarPermiso(int $id_user, string $nombre)
    {
        $sql = "SELECT p.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario =$id_user AND p.permiso ='$nombre'";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getRangoFechas(string $desde, string $hasta)
    {
        $sql = "SELECT c.id, c.nombre, v.* FROM clientes c INNER JOIN ventas v ON v.id_cliente = c.id WHERE (v.fecha BETWEEN '$desde' AND '$hasta 23:59:59')";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getRangoFechaCompra()
    {
        $sql = "";
        $data = $this->selectAll($sql);
        return $data;
    }
}


?>
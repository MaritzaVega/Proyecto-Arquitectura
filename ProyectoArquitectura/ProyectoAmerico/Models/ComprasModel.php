<?php
class ComprasModel extends Query{
   
    
    public function _constructor()
    {
        parent::__construct();

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
<<<<<<< HEAD
    public function getDetalle(string $table, int $id)
    {
        $sql ="SELECT d.*, p.id AS id_pro, p.descripcion FROM $table d INNER JOIN productos p ON d.id_producto = p.id where d.id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data; 
    }
    public function calcularCompra(String $table, int $id_usuario)
=======
    
    public function getDetalle(string $table,int $id)
    {
        $sql ="SELECT d.*, p.id AS id_pro, p.descripcion from $table d INNER JOIN productos p ON d.id_producto = p.id where d.id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data; 
    }
    public function calcularCompra(string $table,int $id_usuario)
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
    {
        $sql ="SELECT sub_total, SUM(sub_total) AS total FROM $table WHERE id_usuario = $id_usuario";
        $data = $this->select($sql);
        return $data; 
    }
    public function deleteDetalle(int $id){
        $sql ="DELETE FROM detalle WHERE id= ?";
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
<<<<<<< HEAD
    public function consultarDetalle(String $table, int $id_producto, int $id_usuario)
=======
    public function consultarDetalle(string $table,int $id_producto, int $id_usuario)
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
    {
        $sql =" SELECT * FROM $table WHERE id_producto = $id_producto AND id_usuario = $id_usuario ";
        $data = $this->select($sql);
        return $data; 
    }

<<<<<<< HEAD
    public function actualizarDetalle(String $table, String $precio, int $cantidad, String $sub_total, int $id_producto, int $id_usuario)
=======
    public function actualizarDetalle(String $table,String $precio, int $cantidad, String $sub_total, int $id_producto, int $id_usuario)
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
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
    public function id_compra() {
        $sql = "SELECT MAX(id) AS id FROM compras";
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
    public function getEmpresa()
    {
        $sql = "SELECT * FROM configuracion";
        $data = $this->select($sql);
        return $data;
    }

    public function vaciarDetalle(int $id_usuario)
    {
        $sql ="DELETE FROM detalle WHERE id_usuario = ?";
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
    public function getReportecompras()
    {
        $sql = "SELECT * FROM compras";
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


}


?>
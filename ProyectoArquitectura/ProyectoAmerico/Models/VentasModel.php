<?php
class VentasModel extends Query{
   
    
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


    ///metodo para aumentar la cant de un producto - NuevaCompra
    public function consultarDetalle(int $id_producto, int $id_usuario)
    {
        $sql =" SELECT * FROM detalle WHERE id_producto = $id_producto AND id_usuario = $id_usuario ";
        $data = $this->select($sql);
        return $data; 
    }

    public function registrarDetalle(int $id_producto, int $id_usuario, String $precio, int $cantidad, String $sub_total)
    {
        $sql ="INSERT INTO detalle(id_producto, id_usuario, precio, cantidad, sub_total) VALUES (?,?,?,?,?)";
        $datos = array($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }

    public function actualizarDetalle(String $precio, int $cantidad, String $sub_total, int $id_producto, int $id_usuario)
    {
        $sql ="UPDATE detalle SET precio = ?, cantidad = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ?";
        $datos = array($precio, $cantidad, $sub_total, $id_producto, $id_usuario);
        $data = $this->save($sql,$datos);
        if ($data == 1) {
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    
}


?>
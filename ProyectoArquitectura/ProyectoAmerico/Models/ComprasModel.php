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
    
    public function getDetalle(int $id)
    {
        $sql ="SELECT d.*, p.id, p.descripcion from detalle d INNER JOIN productos p ON d.id_producto = p.id where d.id_usuario = $id";
        $data = $this->selectAll($sql);
        return $data; 
    }
}


?>
<?php
class ProductosReporteModel extends Query{
    private $codigo, $nombre, $precio_compra, $precio_venta, $nivel, $id, $estado, $img;
    public function _constructor()
    {
        parent::__construct();

    }
    public function getProducto(String $Producto, String $clave)
    {
        $sql = "select * from Productos where Producto='$Producto' and clave='$clave'";
        $data = $this->select($sql);
        return $data; 
    }
    /*caja = documento*/
    public function getDocumentos()
    {
        $sql = "select * from tipodoc";
        $data = $this->selectAll($sql);
        return $data; 
    }
    public function getProductos()
    {
        $sql = "SELECT *  from productos WHERE 1 ";
        $data = $this->selectAll($sql);
        return $data; 
    }
    

}


?>
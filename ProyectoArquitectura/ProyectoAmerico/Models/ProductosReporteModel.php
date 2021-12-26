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
    
    public function verificarPermiso(int $id_user, string $nombre)
    {
        $sql = "SELECT p.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario =$id_user AND p.permiso ='$nombre'";
        $data = $this->selectAll($sql);
        return $data;
    }

}


?>
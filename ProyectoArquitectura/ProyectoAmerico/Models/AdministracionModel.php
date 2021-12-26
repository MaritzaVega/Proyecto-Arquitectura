<?php
class AdministracionModel extends Query{
    
    public function _constructor()
    {
        parent::__construct();

    }
    public function getEmpresa()
    {
        $sql = "select * from configuracion";
        $data = $this->select($sql);
        return $data; 
    }

    public function getDatos(string $table)
    {
        $sql = "SELECT count(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data; 
    }

    public function getVentas()
    {
        $sql = "SELECT count(*) AS total FROM ventas WHERE fecha > CURDATE()";
        $data = $this->select($sql);
        return $data; 
    }
    
    public function modificar(string $nombre, string $telefono, string $dir, string $mensaje, int $id)
    {
        
        $sql = "update configuracion set nombre=?, telefono=?, direccion=?, mensaje=? WHERE id=?";
        $datos = array($nombre,$telefono,$dir,$mensaje,$id);
        $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        
        return $res;
    }
    public function getStockMinimo()
    {
        $sql = "SELECT * FROM productos WHERE cantidad < 15 ORDER BY cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getproductosVendidos()
    {
        $sql = "SELECT d.id_producto, d.cantidad, p.id, p.descripcion, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id = d.id_producto GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
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
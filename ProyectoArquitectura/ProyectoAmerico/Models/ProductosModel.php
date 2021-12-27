<?php
class ProductosModel extends Query{
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
                                                                //id_caja = $documentos     
    public function registrarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, string $img){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->img = $img;
        //$this->nivel = $nivel;

        ///verificamos si existe el Producto
        $verificar = "select * from productos where codigo = '$this->codigo'";
        $existe = $this->select($verificar);
        if(empty($existe)){
            $sql = "insert into productos(codigo, descripcion, precio_compra, precio_venta,foto) values(?,?,?,?,?)";
            $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta,$this->img);
            $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }

    public function modificarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, string $img, int $id){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->img = $img;
        //$this->nivel = $nivel;
        $this->id = $id;

        
            $sql = "update productos set codigo=?, descripcion=?, precio_compra=?,precio_venta=?, foto=? where id=?";
            $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta, $this->img, $this->id);
            $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "Modificado";
            }else{
                $res = "error";
            }
        
        return $res;
    }

    public function editarPro(int $id)
    {
        $sql = "select * from productos where id='$id'";
        $data = $this->select($sql);
        return $data;
    }

    public function accionPro(int $estado, int $id)
    {
        $this -> id = $id;
        $this -> estado = $estado;
        $sql = "UPDATE productos SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
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
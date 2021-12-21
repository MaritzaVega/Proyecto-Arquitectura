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

}


?>
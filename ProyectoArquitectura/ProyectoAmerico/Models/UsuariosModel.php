<?php
class UsuariosModel extends Query{
    public function _constructor()
    {
        parent::__construct();

    }
    public function getUsuario(String $usuario, String $clave)
    {
        $sql = "select * from usuarios where usuario='$usuario' and clave='$clave'";
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
    public function getUsuarios()
    {
        $sql = "select u.*, t.id, t.numdoc from usuarios u INNER JOIN tipodoc t where u.id_numdoc = t.id";
        $data = $this->selectAll($sql);
        return $data; 
    }

    
}


?>
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

    public function getUsuarios()
    {
        $sql = "select * from usuarios";
        $data = $this->selectAll($sql);
        return $data; 
    }
}


?>
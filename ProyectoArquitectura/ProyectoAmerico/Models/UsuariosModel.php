<?php
class UsuariosModel extends Query{
    public function _constructor()
    {
        parent::__construct();

    }
    public function getUsuario()
    {
        $sql = "select * from usuarios";
        $data = $this->select($sql);
        return $data; 
    }
}


?>
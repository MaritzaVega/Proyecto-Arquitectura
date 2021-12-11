<?php
class UsuariosModel extends Query{
    public function __construct()
    {
          parent::__construct();
    }

    public function __getUsuario()
    {
          $sql = "SELECT * FROM usuario";
          $data = $this->select($sql);
          return $data;
    }
}

?>
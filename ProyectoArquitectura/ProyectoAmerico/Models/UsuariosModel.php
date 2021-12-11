<?php
class UsuariosModel extends Query{
<<<<<<< HEAD
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

=======
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


>>>>>>> 399ed9d6802ee678ceb7cde555fb400cc3d7b084
?>
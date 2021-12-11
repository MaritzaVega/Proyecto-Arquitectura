<?php
class Conexion{
<<<<<<< HEAD

=======
>>>>>>> 399ed9d6802ee678ceb7cde555fb400cc3d7b084
    private $conect;
    public function __construct()
    {
        $pdo = "mysql:host=".host.";dbname=".db.";.charset.";
<<<<<<< HEAD
        try{
=======
        try { //capturamos las excepciones
>>>>>>> 399ed9d6802ee678ceb7cde555fb400cc3d7b084
            $this->conect = new PDO($pdo, user, pass);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexion".$e->getMessage();
<<<<<<< HEAD

        }
    }

   public function conect ()
   {
        return $this->conect;
   }
}

=======
        }
    }
    public function conect()
    {
        return $this->conect;
    }
}
 
>>>>>>> 399ed9d6802ee678ceb7cde555fb400cc3d7b084
?>
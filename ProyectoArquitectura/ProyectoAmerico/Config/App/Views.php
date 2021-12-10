<?php
<<<<<<< HEAD
    class Views{
        public function getView($controlador, $vista){
            $controlador =  get_class($controlador);
            if($controlador == "Home"){
                $vista = "Views/".$vista.".php";
            }else{
                $vista = "Views/".$controlador."/".$vista.".php";
            }
            require $vista;
        }
    }
?>

=======
class Views{
    public function getView($controlador, $vista)
    {
        $controlador = get_class($controlador);
        if($controlador == "Home"){
            $vista = "Views/".$vista.".php";
        }else{
            $vista = "Views/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}
?>
>>>>>>> 2efd88ae5a9ace2566adc99baf40f1731fb450aa

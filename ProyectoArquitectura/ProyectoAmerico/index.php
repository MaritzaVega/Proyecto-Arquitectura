<?php
    require_once "Config/Config.php";


    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index"; //captura el url
    $array = explode("/",$ruta);
    $controller = $array[0];
    $metodo = "index";
    $parametro = "";

    // Validaciones para verificar si existe el método
    if(!empty($array[1])){
        if(!empty($array[1] != "")){
            $metodo = $array[1];
        }
    }
    //verificar si existe los parametros
    if(!empty($array[2])){
        if(!empty($array[2] != "")){
            for ($i=2; $i < count($array); $i++) { 
                $parametro .= $array[$i]. ",";
            }
            //eliminar el ultimo caracter
            $parametro = trim($parametro, ",");
        }
    }

    require_once 'Config/App/autoload.php';

    //RUTAS DE CONTROLADORES
    //almacenamos la ruta de la carpeta controller
    $dirControllers = "Controllers/" . $controller . ".php";
    if (file_exists($dirControllers)) {
        require_once $dirControllers;
        $controller = new $controller();
        if (method_exists($controller, $metodo)) {
            $controller->$metodo($parametro);
        } else {
            echo 'No existe el metodo';
        }
    } else {
        echo 'No existe el controlador';
    }

?>

<?php
class Usuarios extends Controller{

    public function __construct() {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }

    public function listar()
    {
        //print_r($this->model->getUsuarios());
        $data =  $this->model->getUsuarios();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function validar()
    {
        if(empty($_POST['usuario']) || empty($_POST['clave'])){
            $msg = "Los campos estan vacios";
        }else{
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $data = $this->model->getUsuario($usuario,$clave);
            if($data){
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $msg = "ok";
            }else{
                $msg = "Uusario o constraseña incorrecta";
            }   
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }
}


?>
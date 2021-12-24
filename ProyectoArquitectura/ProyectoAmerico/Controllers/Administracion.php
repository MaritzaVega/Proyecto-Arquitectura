<?php
class Administracion extends Controller{
    public function __construct() {
        session_start();
        if(empty($_SESSION['activo'])){ 
            header("location: ".base_url); 
        }
        parent::__construct();
    }
    public function index()
    {
        $data = $this->model->getEmpresa();
        $this->views->getView($this, "index", $data);
    }

    //Vista de Administrador
    public function home()
    {
    $data['usuarios'] = $this->model->getDatos('usuarios');
    $data['clientes'] = $this->model->getDatos('clientes');
    $data['productos'] = $this->model->getDatos('productos');

    $this->views->getView($this, "home", $data);
    }

    public function modificar()
    {
        $nombre = $_POST['nombre'];
        $tel = $_POST['telefono'];
        $dir = $_POST['direccion'];
        $mensaje = $_POST['mensaje'];
        $id = $_POST['id'];
        $data = $this->model->modificar($nombre,$tel,$dir,$mensaje,$id);
        if($data == 'ok'){
            $msg = 'ok';
        }else{
            $msg = 'error';
        }
        echo json_encode($msg);
        die();
    }

    public function reporteStock()
    {
        $data = $this->model->getStockMinimo();
        echo json_encode($data);
        die();

    }

    public function productosVendidos()
    {
        $data = $this->model->getproductosVendidos();
        echo json_encode($data);
        die();

    }

}
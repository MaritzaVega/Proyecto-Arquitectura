<?php
class Compras extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();

    }
    public function index ()
    {
        $this->views->getView($this, "index");
    }

    public function buscarCodigo($cod)
    {
        //saber si captura el codigo
        //print_r($cod);
        $data = $this->model->getProCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

   
}
?>
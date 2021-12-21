<?php
class ProductosReporte extends Controller{

    public function __construct() {
        session_start();
       
        parent::__construct();
    }
    public function index()
    {
        if(empty($_SESSION["activo"])){
            header("location: ".base_url);
        }
        $data['documentos'] = $this->model->getDocumentos();
        $this->views->getView($this, "index", $data);
    }

    public function listar()
    {
        //print_r($this->model->getProductos());
        $data =  $this->model->getProductos();
        for ($i=0; $i < count($data) ; $i++) {
            //Imagen del producto
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="'.base_url."Assets/img/".$data[$i]['foto'].'" width="100">';
            //Estado del Producto
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    


}

?>
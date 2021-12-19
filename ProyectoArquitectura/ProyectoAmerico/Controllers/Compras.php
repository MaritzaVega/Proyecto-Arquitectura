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

    public function ingresar()
    {
        //print_r($_POST);
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        //print_r($datos);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_compra'];
        $cantidad = $_POST['cantidad'];
        
        ///variable para aumentar la cant de un producto NuevaCompra
        $comprobar = $this->model->consultarDetalle($id_producto,$id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            $data = $this->model->registrarDetalle($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
            if ($data == "ok") {
                $msg = "ok";
            }else{
                $msg = "Error al ingresar el producto";
            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle($precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
            if ($data == "Producto Modificado") {
                $msg = "Producto Modificado";
            }else{
                $msg = "Error al modificar el producto";
            }
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        $id_usuario = $_SESSION['id_usuario'];
        $data['detalle'] = $this->model->getDetalle($id_usuario);
        $data['total_pagar'] = $this->model->calcularCompra($id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function delete($id)
    {
        $data = $this->model->deleteDetalle($id);
        if ($data == 'ok') {
            $msg = 'ok';
        }else {
            $msg = 'error';
        }
        echo json_encode($msg);
        die();
 
    }
    ///metodo para detalle_compra
    public function registrarCompra()
    {
        $id_usuario = $_SESSION['id_usuario'];
        $total= $this->model->calcularCompra($id_usuario);
        $data = $this->model->registrarCompra($total['total']);  
        if ($data == 'ok') {
            $detalle = $this->model->getDetalle($id_usuario);
            $id_compra = $this->model->id_compra();
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $id_pro = $row['id_producto'];
                $sub_total = $cantidad * $precio;
                $this->model->registrarDetalleCompra($id_compra['id'], $id_pro, $cantidad, $precio, $sub_total);
            }
            $msg = 'ok';
        }else{
            $msg = 'Error al realizar la compra';
        }
        echo json_encode($msg);
        die();
    }
   
}
?>
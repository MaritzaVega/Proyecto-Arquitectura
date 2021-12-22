<?php
class Ventas extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();

    }
    public function index()
    {
        $this->views->getView($this, "index");
    }

    /*public function buscarVenta($cod)
    {
        //saber si captura el codigo
        //print_r($cod);
        $data = $this->model->getProCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }*/
    public function buscarCodigo($cod)
    {
        //saber si captura el codigo
        //print_r($cod);
        $data = $this->model->getProCod($cod);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresarVenta()
    {
        //print_r($_POST);
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];
        
        ///variable para aumentar la cant de un producto NuevaCompra
        $comprobar = $this->model->consultarDetalle($id_producto,$id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            $data = $this->model->registrarDetalleVenta($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
            if ($data == "ok") {
                $msg = array('msg'=> 'Producto ingresado a la venta', 'icono'=> 'success');
            }else{
                $msg = array('msg'=> 'Error al ingresar el producto a la venta', 'icono'=> 'error');
            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle($precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
            if ($data == "modificado") {
                $msg = array('msg'=> 'Producto actualizado', 'icono'=> 'success');
            }else{
                $msg = array('msg'=> 'Error al actualizar el producto', 'icono'=> 'error');
            }
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
       
}
?>
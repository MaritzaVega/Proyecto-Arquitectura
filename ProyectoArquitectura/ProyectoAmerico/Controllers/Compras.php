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
            if ($data == "modificado") {
                $msg = "modificado";
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
            $vaciar = $this->model->vaciarDetalle($id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_compra' => $id_compra['id']);
            }
           
        }else{
            $msg = 'Error al realizar la compra';
        }
        echo json_encode($msg);
        die();
    }

    /// GENERANDO PDF parte 1   http://www.fpdf.org/
    public function generarPdf($id_compra)
    {
        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getProCompra($id_compra);

        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(7, 0, 0);
        $pdf->SetTitle('Reporte de Compra');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(60,15, utf8_decode($empresa['nombre']), 0, 1, 'C');
        $pdf->Image(base_url . 'Assets/imagenes/logo.JPG', 52, 25, 20, 20);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, 'Ruc: ', 0, 0, 'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, $empresa['ruc'], 0, 1, 'L');
       

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, utf8_decode('Teléfono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, $empresa['telefono'], 0, 1, 'L');
        

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, utf8_decode('Dirección: '), 0, 0, 'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, utf8_decode($empresa['direccion']), 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, utf8_decode('Folio: '), 0, 0, 'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18, 7, $id_compra, 0, 1, 'L');
        $pdf->Ln();

        // GENERANDO PDF parte 2
        //Encabezado de productos
        $pdf->SetFillColor(133, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(10, 5, 'Cant', 0, 0, 'L', true);
        $pdf->Cell(27, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
        $pdf->Cell(12, 5, 'Precio', 0, 0, 'L', true);
        $pdf->Cell(17, 5, 'Sub Total', 0, 1, 'L', true);
        
        $pdf->SetTextColor(0, 0, 0);
        $total = 0.00;
        foreach($productos as $row){
            $total = $total + $row['sub_total'];
            $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'L');
            $pdf->Cell(27, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
            $pdf->Cell(12, 5, $row['precio'], 0, 0, 'L');
            $pdf->Cell(17, 5, number_format( $row['sub_total'], 2, '.', '.'), 0, 1, 'L');

        }
        $pdf->Ln();
        $pdf->Cell(65, 5, 'Total a pagar', 0, 1, 'R');
        $pdf->Cell(65, 5, number_format($total, 2, '.', ','), 0, 0, 'R');

        $pdf->Output();
    }

    ///ReporteCompras donde ..Historial... = Reporte
    public function reporte()
    {
        $this->views->getView($this, "reporte");
    }

    public function listar_reporte()
    {
        $data = $this->model->getReportecompras();
        for ($i=0; $i < count($data) ; $i++) { 
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url. "Compras/generarPdf/".$data[$i]['id'].'" target = "_blank"><i class="fas fa-file-pdf"></i></a>
                </div>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>
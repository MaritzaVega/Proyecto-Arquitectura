<?php
class Compras extends Controller{
    public function __construct()
    {
        session_start();
        parent::__construct();

    }
    public function index ()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user,'nueva_compra');
        if(!empty($verificar)){
            $this->views->getView($this, "index");
        }else{
            header('Location: '.base_url.'Errors/permisos');
        }

        
    }
    public function ventas ()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user,'nueva_venta');
        if(!empty($verificar)){
            $data = $this -> model ->getClientes();
            $this->views->getView($this, "ventas", $data);
        }else{
            header('Location: '.base_url.'Errors/permisos');
        }

        
    }
    public function reporte_venta()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user,'reporte_venta');
        if(!empty($verificar)){
            $this->views->getView($this, "reporte_venta");
        }else{
            header('Location: '.base_url.'Errors/permisos');
        }
        
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
        $comprobar = $this->model->consultarDetalle('detalle',$id_producto,$id_usuario);
        if (empty($comprobar)) {
            $sub_total = $precio * $cantidad;
            $data = $this->model->registrarDetalle('detalle',$id_producto, $id_usuario, $precio, $cantidad, $sub_total);
            if ($data == "ok") {
                $msg = array('msg'=> 'Producto ingresado a la compra', 'icono'=> 'success');
            }else{
                $msg = array('msg'=> 'Error al ingresar el producto a la compra', 'icono'=> 'error');
            }
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = $total_cantidad * $precio;
            $data = $this->model->actualizarDetalle('detalle',$precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
            if ($data == "modificado") {
                $msg = array('msg'=> 'Producto actualizado', 'icono'=> 'success');
            }else{
                $msg = array('msg'=> 'Error al actualizar el producto', 'icono'=> 'error');
            }
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function ingresarVenta()
    {
        //print_r($_POST);
        $id = $_POST['id'];
        $datos = $this->model->getProductos($id);
        //print_r($datos);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];
        
        ///variable para aumentar la cant de un producto NuevaCompra
        $comprobar = $this->model->consultarDetalle('detalle_temp',$id_producto,$id_usuario);
        if (empty($comprobar)) {
            if ($datos['cantidad'] >= $cantidad) {
                $sub_total = $precio * $cantidad;
                $data = $this->model->registrarDetalle('detalle_temp',$id_producto, $id_usuario, $precio, $cantidad, $sub_total);
                if ($data == "ok") {
                $msg = array('msg'=> 'Producto ingresado a la venta', 'icono'=> 'success');
                }else{
                $msg = array('msg'=> 'Error al ingresar el producto a la venta', 'icono'=> 'error');
                }
                }else {
                    $msg = array('msg'=> 'Stock no disponible: '. $datos['cantidad'], 'icono'=> 'warning');
                }
            
            
        }else{
            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sub_total = ($total_cantidad * $precio);
            if ($datos['cantidad'] < $total_cantidad) {
                $msg = array('msg'=> 'Stock no disponible', 'icono'=> 'warning');
            }else{
                $data = $this->model->actualizarDetalle('detalle_temp',$precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
                if ($data == "modificado") {
                    $msg = array('msg'=> 'Producto actualizado', 'icono'=> 'success');
                }else{
                    $msg = array('msg'=> 'Error al actualizar el producto', 'icono'=> 'error');
                }
            }
            
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar($table)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $data['detalle'] = $this->model->getDetalle($table,$id_usuario);
        $data['total_pagar'] = $this->model->calcularCompra($table,$id_usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function delete($id)
    {
        $data = $this->model->deleteDetalle('detalle', $id);
        if ($data == 'ok') {
            $msg = 'ok';
        }else {
            $msg = 'error';
        }
        echo json_encode($msg);
        die();
 
    }
    public function deleteVenta($id)
    {
        $data = $this->model->deleteDetalle('detalle_temp', $id);
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
        $total= $this->model->calcularCompra('detalle',$id_usuario);
        $data = $this->model->registrarCompra($total['total']);  
        if ($data == 'ok') {
            $detalle = $this->model->getDetalle('detalle',$id_usuario);
            $id_compra = $this->model->getId('compras');
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $id_pro = $row['id_producto'];
                $sub_total = $cantidad * $precio;
                $this->model->registrarDetalleCompra($id_compra['id'], $id_pro, $cantidad, $precio, $sub_total);
                
                //ACTUALIZAR EL STOCK DE LOS PRODUCTOS
                $stock_actual = $this->model->getProductos($id_pro);
                $stock = $stock_actual['cantidad'] + $cantidad;
                $this->model->actualizarStock($stock, $id_pro); //Adquirir de los proveedores

            }
            $vaciar = $this->model->vaciarDetalle('detalle', $id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_compra' => $id_compra['id']);
            }
           
        }else{
            $msg = 'Error al realizar la compra';
        }
        echo json_encode($msg);
        die();
    }

    public function registrarVenta($id_cliente)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $total= $this->model->calcularCompra('detalle_temp',$id_usuario);
        $data = $this->model->registrarVenta($id_cliente, $total['total']);  
        if ($data == 'ok') {
            $detalle = $this->model->getDetalle('detalle_temp',$id_usuario);
            $id_venta = $this->model->getId('ventas');
            foreach($detalle as $row){
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $id_pro = $row['id_producto'];
                $sub_total = $cantidad * $precio;
                $this->model->registrarDetalleVenta($id_venta['id'], $id_pro, $cantidad, $precio, $sub_total);
                
                //ACTUALIZAR EL STOCK DE LOS PRODUCTOS
                $stock_actual = $this->model->getProductos($id_pro);
                $stock = $stock_actual['cantidad'] - $cantidad;
                $this->model->actualizarStock($stock, $id_pro); //Adquirir de los proveedores

            }
            $vaciar = $this->model->vaciarDetalle('detalle_temp', $id_usuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'id_venta' => $id_venta['id']);
            }
           
        }else{
            $msg = 'Error al realizar la venta';
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
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 5, 'Cant', 0, 0, 'C', true);
        $pdf->Cell(27, 5, utf8_decode('Descripción'), 0, 0, 'C', true);
        $pdf->Cell(12, 5, 'Precio', 0, 0, 'C', true);
        $pdf->Cell(17, 5, 'Sub Total', 0, 1, 'C', true);
        
        $pdf->SetTextColor(0, 0, 0);
        $total = 0.00;
        $pdf->SetFont('Arial','',9);
        foreach($productos as $row){
            $total = $total + $row['sub_total'];
            $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'C');
            $pdf->Cell(27, 5, utf8_decode($row['descripcion']), 0, 0, 'C');
            $pdf->Cell(12, 5, $row['precio'], 0, 0, 'C');
            $pdf->Cell(17, 5, number_format( $row['sub_total'], 2, '.', '.'), 0, 1, 'C');

        }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(65, 5, 'Total a pagar', 0, 1, 'R');
        $pdf->Cell(65, 5, number_format($total, 2, '.', ','), 0, 0, 'R');

        $pdf->Output();
    }

    ///ReporteCompras donde ..Historial... = Reporte
    public function reporte()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user,'reporte_compra');
        if(!empty($verificar)){
            $this->views->getView($this, "reporte");
        }else{
            header('Location: '.base_url.'Errors/permisos');
        }
        
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

    public function listar_reporte_venta()
    {
        $data = $this->model->getReporteVentas();
        for ($i=0; $i < count($data) ; $i++) { 
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url. "Compras/generarPdfVenta/".$data[$i]['id'].'" target = "_blank"><i class="fas fa-file-pdf"></i></a>
                </div>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPdfVenta($id_venta)
    {
        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getProVenta($id_venta);

        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(7, 0, 0);
        $pdf->SetTitle('Reporte de Venta');
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
        $pdf->Cell(18, 7, $id_venta, 0, 1, 'L');
        $pdf->Ln();

        //Encabezado de clientes
        $pdf->SetFillColor(133, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(15, 5, 'Nombre', 0, 0, 'C', true);
        $pdf->Cell(15, 5, utf8_decode('Teléfono'), 0, 0, 'C', true);
        $pdf->Cell(35, 5, utf8_decode('Dirección'), 0, 1, 'C', true);
        $pdf->SetTextColor(0, 0, 0);
        $clientes=$this->model->clientesVenta($id_venta);
        $pdf->SetFont('Arial','',8);
                        
            $pdf->Cell(15, 5, utf8_decode($clientes['nombre']), 0, 0, 'C');
            $pdf->Cell(15, 5, utf8_decode($clientes['telefono']), 0, 0, 'C');
            $pdf->Cell(35, 5, utf8_decode($clientes['direccion']), 0, 1, 'C');


        $pdf->Ln();
        // GENERANDO PDF parte 2
        //Encabezado de productos
        $pdf->SetFillColor(133, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 5, 'Cant', 0, 0, 'C', true);
        $pdf->Cell(25, 5, utf8_decode('Descripción'), 0, 0, 'C', true);
        $pdf->Cell(15, 5, 'Precio', 0, 0, 'C', true);
        $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'C', true);
        
        $pdf->SetTextColor(0, 0, 0);
        $total = 0.00;
        $pdf->SetFont('Arial','',9);
        foreach($productos as $row){
            $total = $total + $row['sub_total'];
            $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'C');
            $pdf->Cell(25, 5, utf8_decode($row['descripcion']), 0, 0, 'C');
            $pdf->Cell(15, 5, $row['precio'], 0, 0, 'C');
            $pdf->Cell(15, 5, number_format( $row['sub_total'], 2, '.', '.'), 0, 1, 'C');

        }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(65, 5, 'Total a pagar', 0, 1, 'R');
        $pdf->Cell(65, 5, number_format($total, 2, '.', ','), 0, 0, 'R');

        $pdf->Output();
    }

    ///Reporte de pdf con fechas reporteVenta
    public function pdf()
    {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        if (empty($desde) || empty($hasta)) {
            $data = $this->model->getReporteVentas();
        }else {
            $data = $this->model->getRangoFechas($desde,$hasta);
        }

        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(10, 0, 0);
        $pdf->SetTitle('Reporte de Ventas');
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(133, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(15, 5, 'Id', 0, 0, 'C',true);
            $pdf->Cell(35, 5, 'Cliente', 0, 0, 'C',true);
            $pdf->Cell(30, 5, 'Fecha', 0, 0, 'C',true);
            $pdf->Cell(30, 5, 'Hora', 0, 0, 'C',true);
            $pdf->Cell(30, 5, 'Total', 0, 1, 'C',true);
            
        $pdf->SetFont('Arial','',10);
        $pdf->SetTextColor(0, 0, 0);
        foreach($data as $row){
            $pdf->Cell(20, 5, $row['id'], 0, 0, 'C');
            $pdf->Cell(30, 5, $row['nombre'], 0, 0, 'C');
            $pdf->Cell(50, 5, $row['fecha'], 0, 0, 'C');
            $pdf->Cell(50, 5, $row['total'], 0, 1, 'C');
        }
        
        $pdf->Output();
    }

    ///Reporte de pdf con fechas reporteCompra
    public function pdfcompra()
    {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        if (empty($desde) || empty($hasta)) {
            $data = $this->model->getReporteCompra2();
        }else {
            $data = $this->model->getRangoFechaCompra($desde,$hasta);
        }

        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(10, 0, 0);
        $pdf->SetTitle('Reporte de Compra');
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(133, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(15, 5, 'Id', 0, 0, 'C',true);
            $pdf->Cell(35, 5, 'Total', 0, 0, 'C',true);
            $pdf->Cell(50, 5, 'Fecha', 0, 1, 'C',true);
            
        $pdf->SetFont('Arial','',10);
        $pdf->SetTextColor(0, 0, 0);
        foreach($data as $row){
            $pdf->Cell(15, 5, $row['id'], 0, 0, 'C');
            $pdf->Cell(35, 5, $row['total'], 0, 0, 'C');
            $pdf->Cell(50, 5, $row['fecha'], 0, 1, 'C');
        }
        
        $pdf->Output();
    }
}
?>
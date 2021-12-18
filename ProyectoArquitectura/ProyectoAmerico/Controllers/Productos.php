<?php
class Productos extends Controller{

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

            //Botones modificar y eliminar
            $data[$i]['acciones'] = '<div><button class="btn btn-primary" type="button" onclick="btnEditarPro('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarPro('.$data[$i]['id'].');">Reingresar</button>
            </div>'; 
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    
    public function registrar()
    {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta = $_POST['precio_venta'];
        $nivel = $_POST['nivel'];
        $id = $_POST['id'];
        //imagen
        $img = $_FILES['imagen'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $destino = "Assets/img/".$name;
        if(empty($name)){
            $name = "default.jpg";
        }

        if(empty($codigo) || empty($nombre) || empty($precio_compra) || empty($precio_venta) || empty($nivel)){
            $msg="Todos los campos son obligatorios";
        }else{
            
            if($id==""){

                    $data = $this->model->registrarProducto($codigo, $nombre, $precio_compra, $precio_venta,$name, $nivel);
                    if ($data == "ok"){
                        $msg = "si";
                        move_uploaded_file($tmpname, $destino);
                    }else if($data == "existe"){
                        $msg = "El Producto ya existe";
                    }else{
                        $msg="Error al registrar el Producto";
                    }
                
                
            }else{
                if($_POST['foto_actual'] != $_POST['foto_delete']){
                    $imgDelete =$this->model->editarPro($id);
                    if($imgDelete['foto'] != 'default.jpg' || $imgDelete['foto'] != ""){
                        if(file_exists($destino . $imgDelete['foto'])){
                            unlink($destino . $imgDelete['foto']);
                        }
                    }
                    $data = $this->model->modificarProducto($codigo, $nombre, $precio_compra, $precio_venta, $name,$nivel,$id);
                    if ($data == "Modificado"){
                        move_uploaded_file($tmpname, $destino);
                        $msg = "Modificado";
                    }else{
                        $msg="Error al modificar el Producto";
                    }
                }
                
            }
            
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $id)
    {
        $data = $this->model->editarPro($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionPro(0, $id);
        if($data==1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el Producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionPro(1, $id);
        if($data==1){
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el Producto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>
<?php
class clientes extends Controller{

    public function __construct() {
        session_start();
        if(empty($_SESSION["activo"])){
            header("location: ".base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }

    public function listar()
    {
        //print_r($this->model->getUsuarios());
        $data =  $this->model->getClientes();
        for ($i=0; $i < count($data) ; $i++) { 
            //Estado del dni
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }

            //Botones modificar y eliminar
            $data[$i]['acciones'] = '<div><button class="btn btn-primary" type="button" onclick="btnEditarCli('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCli('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarCli('.$data[$i]['id'].');">Reingresar</button>
            </div>'; 
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function registrar()
    {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $id = $_POST['id'];

        //$hash = password_hash($direccion, PASSWORD_DEFAULT);

        if(empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)){
            $msg= array('msg'=> 'Todos los campos son obligatorios','icono' => 'Warning');
          
        }else{
            if($id==""){

                $data = $this->model->registrarCliente($dni, $nombre, $telefono, $direccion);
                if ($data == "ok"){
                    $msg= array('msg'=> 'Cliente registrado con èxito','icono' => 'success');
                }else if($data == "existe"){
                    $msg= array('msg'=> 'El dni ya existe','icono' => 'warning');
                }else{
                    $msg= array('msg'=> 'Error al registrar cliente','icono' => 'error');
                }
                
                
            }else{
                $data = $this->model->modificarCliente($dni, $nombre, $telefono, $direccion, $id);
                    if ($data == "Modificado"){
                        $msg= array('msg'=> 'Cliente modificado con èxito','icono' => 'success');
                    }else{
                        $msg= array('msg'=> 'Error al modificar el cliente','icono' => 'error');
                    }
            }
            
        }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}

    public function editar(int $id)
    {
        $data = $this->model->editarCli($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionCli(0, $id);
        if($data==1){
            $msg= array('msg'=> 'Cliente dado de baja','icono' => 'success');
        }else{
            $msg= array('msg'=> 'Error al eliminar el Cliente','icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionCli(1, $id);
        if($data==1){
            $msg= array('msg'=> 'Cliente reingresado con èxito','icono' => 'success');
        }else{
            $msg= array('msg'=> 'Error al reingresar el Cliente','icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>
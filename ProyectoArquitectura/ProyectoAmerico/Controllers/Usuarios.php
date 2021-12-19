<?php
class Usuarios extends Controller{

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
        //print_r($this->model->getUsuarios());
        $data =  $this->model->getUsuarios();
        for ($i=0; $i < count($data) ; $i++) { 
            //Estado del usuario
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }

            //Botones modificar y eliminar
            $data[$i]['acciones'] = '<div><button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');">Reingresar</button>
            </div>'; 
            
        }
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
            $hash = hash("SHA256", $clave);
            $data = $this->model->getUsuario($usuario,$hash); //se debe poner $hash en vez de $clave
            if($data){
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Usario o constraseña incorrecta";
            }   
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }


//video 7
    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $documentos = $_POST['documentos'];
        $numDocumento = $_POST['numDocumento'];
        $id = $_POST['id'];

        //variable para encriptar las contraseñas
        $hash = hash("SHA256", $clave);
        //$hash = password_hash($clave, PASSWORD_DEFAULT);

        if(empty($usuario) || empty($nombre) || empty($documentos) || empty($numDocumento)){
            $msg="Todos los campos son obligatorios";
        }else{
            if($id==""){

                if($clave != $confirmar){
                    $msg = "Las contraseñas con coinciden";
                }else{
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $documentos, $numDocumento);
                    if ($data == "ok"){
                        $msg = "si";
                    }else if($data == "existe"){
                        $msg = "El usuario ya existe";
                    }else{
                        $msg="Error al registrar el usuario";
                    }
                }
                
            }else{
                $data = $this->model->modificarUsuario($usuario, $nombre, $documentos, $numDocumento,$id);
                    if ($data == "Modificado"){
                        $msg = "Modificado";
                    }else{
                        $msg="Error al modificar el usuario";
                    }
            }
            
        }
    echo json_encode($msg,JSON_UNESCAPED_UNICODE);
    die();
}

public function editar(int $id)
    {
        $data = $this->model->editarUser($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id)
    {
        $data = $this->model->accionUser(0, $id);
        if($data==1){
            $msg = "ok";
        }else{
            $msg = "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionUser(1, $id);
        if($data==1){
            $msg = "ok";
        }else{
            $msg = "Error al reingresar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }

}

?>
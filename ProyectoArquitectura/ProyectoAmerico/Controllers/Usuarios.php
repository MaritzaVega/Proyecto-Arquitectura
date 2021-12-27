<?php
class Usuarios extends Controller{

    public function __construct() {
        session_start();
       
        parent::__construct();
    }
    public function index()
    {
        $id_user = $_SESSION['id_usuario'];
        $verificar = $this->model->verificarPermiso($id_user,'usuarios');
        if(!empty($verificar)){
            if(empty($_SESSION["activo"])){
                header("location: ".base_url);
            }
            $data['documentos'] = $this->model->getDocumentos();
            $this->views->getView($this, "index", $data);
        }else{
            header('Location: '.base_url.'Errors/permisos');
        }
        
    }

    public function listar()
    {
        //print_r($this->model->getUsuarios());
        $data =  $this->model->getUsuarios();
        for ($i=0; $i < count($data) ; $i++) { 
            //Estado del usuario
            if($data[$i]['estado'] == 1){
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-dark" href="'.base_url.'Usuarios/permisos/'.$data[$i]['id'].'" ><i class="fas fa-key"></i></a>
                <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
                </div>'; 
            }else{
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');">Reingresar</button>
                </div>'; 
            }
            //Botones modificar y eliminar
           /*
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-dark" href="'.base_url.'Usuarios/permisos/'.$data[$i]['id'].'" ><i class="fas fa-key"></i></a>
            <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');">Reingresar</button>
            </div>'; */  
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    ////Logeo
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
                $_SESSION['doc'] = $data['numdoc'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "Usuario o clave incorrecta";
            }   
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }

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
            $msg= array('msg'=> 'Todos los campos son obligatorios','icono' => 'Warning');
        }else{
            if($id==""){
                if($clave != $confirmar){
                    $msg= array('msg'=> 'Las contraseñas no coinciden','icono' => 'Warning');
                }else{
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $documentos, $numDocumento);
                    if ($data == "ok"){
                        $msg= array('msg'=> 'Usuario registrado con èxito','icono' => 'success');
                    }else if($data == "existe"){
                        $msg= array('msg'=> 'El usuario ya existe','icono' => 'warning');
                    }else{
                        $msg= array('msg'=> 'Error al registrar el usuario','icono' => 'error');
                    }
                }
                
            }else{
                $data = $this->model->modificarUsuario($usuario, $nombre, $documentos, $numDocumento,$id);
                    if ($data == "Modificado"){
                        $msg= array('msg'=> 'Usuario modificado con èxito','icono' => 'success');
                    }else{
                        $msg= array('msg'=> 'Error al modificar el usuario','icono' => 'error');
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
            $msg= array('msg'=> 'Usuario dado de baja','icono' => 'success');
        }else{
            $msg= array('msg'=> 'Error al eliminar el usuario','icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id)
    {
        $data = $this->model->accionUser(1, $id);
        if($data==1){
            $msg= array('msg'=> 'Usuario reingresado con èxito','icono' => 'success');
        }else{
            $msg= array('msg'=> 'Error al reingresar el usuario','icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function cambiarPass(){
        $actual = $_POST['clave_actual'];
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['confirmar_clave'];
        if (empty($actual) || empty($nueva) || empty($confirmar)) {
            $mensaje = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        }else{
            if ($nueva != $confirmar) {
                $mensaje = array('msg' => 'Las contraseñas no coinciden', 'icono' => 'warning');
            }else{
                $id = $_SESSION['id_usuario'];
                $hash = hash("SHA256", $actual);
                $data = $this->model->getPass($hash, $id);
                if (!empty($data)) {                    
                    $verificar = $this->model->modificarPass(hash("SHA256", $nueva), $id);
                    if ($verificar == 1) {
                        $mensaje = array('msg' => 'Contraseña modificada con éxito', 'icono' => 'success');
                    }else{
                        $mensaje = array('msg' => 'Error al modificar la contraseña', 'icono' => 'error');
                    }
                }else{
                    $mensaje = array('msg' => 'La contraseña actual es incorrecta', 'icono' => 'warning');
                }
            }
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    

    public function permisos($id)
    {
        if(empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        $data['datos'] = $this->model->getPermisos();
        $permisos = $this->model->getDetallePermisos($id);
        $data['asignados'] = array();
        foreach ($permisos as $permiso) {
            $data['asignados'][$permiso['id_permiso']] = true;
        }
        $data['id_usuario'] = $id;
        $this->views->getView($this, "permisos", $data);
    }

    public function registrarPermiso()
    {
        $msg='';
        $id_user = $_POST['id_usuario'];
        $eliminar = $this->model->eliminarPermisos($id_user);
        if($eliminar == 'ok'){
            foreach($_POST['permisos'] as $id_permiso){
                $msg = $this->model->registrarPermisos($id_user,$id_permiso);
            }
            if($msg == 'ok'){
                $msg = array('msg' => 'Permisos Asignados', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al asignar permisos', 'icono' => 'error');
            }
        }else{
            $msg = array('msg' => 'Error al eliminar los permisos anteriores', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        
    }

    public function salir()
        {
            session_destroy();
            header("location: ".base_url);
        }
}

?>
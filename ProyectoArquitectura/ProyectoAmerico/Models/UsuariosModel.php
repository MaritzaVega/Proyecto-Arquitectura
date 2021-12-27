<?php
class UsuariosModel extends Query{
    private $usuario, $nombre, $clave, $documentos, $numDocumento, $id, $estado;
    public function _constructor()
    {
        parent::__construct();

    }
    public function getUsuario(String $usuario, String $clave)
    {
        $sql = "select * from usuarios where usuario='$usuario' and clave='$clave'";
        $data = $this->select($sql);
        return $data; 
    }
    /*caja = documento*/
    public function getDocumentos()
    {
        $sql = "select * from tipodoc";
        $data = $this->selectAll($sql);
        return $data; 
    }
    
    public function getUsuarios()
    {
        $sql = "select u.*, u.id as id from usuarios u INNER JOIN tipodoc t where u.id_numdoc = t.id";
        $data = $this->selectAll($sql);
        return $data; 
    }
                                                                //id_caja = $documentos     
    public function registrarUsuario(string $usuario, string $nombre, string $clave, int $documentos, int $numDocumento){
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->documentos = $documentos;
        $this->numDocumento = $numDocumento;

        ///verificamos si existe el usuario
        $verificar = "select * from usuarios where usuario = '$this->usuario'";
        $existe = $this->select($verificar);
        if(empty($existe)){
            $sql = "insert into usuarios(usuario, nombre, clave, id_numdoc,numdoc) values(?,?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->documentos, $this->numDocumento);
            $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }

    public function modificarUsuario(string $usuario, string $nombre, int $numDocumento,int $documentos, int $id){
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->id = $id;
        $this->documentos = $documentos;
        $this->numDocumento = $numDocumento;

        
            $sql = "update usuarios set usuario=?, nombre=?, numdoc=?,id_numdoc=? where id=?";
            $datos = array($this->usuario, $this->nombre, $this->documentos, $this->numDocumento, $this->id);
            $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "Modificado";
            }else{
                $res = "error";
            }
        
        return $res;
    }

    public function editarUser(int $id)
    {
        $sql = "select * from usuarios where id='$id'";
        $data = $this->select($sql);
        return $data;
    }


    public function getPass(string $clave, int $id)
    {
        $sql = "SELECT * from usuarios where clave= '$clave' and id= $id";
        $data = $this->select($sql);
        return $data;
    }

    public function accionUser(int $estado, int $id)
    {
        $this -> id = $id;
        $this -> estado = $estado;
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }

    public function modificarPass(String $clave, int $id){
        $sql = "UPDATE usuarios SET clave = ? WHERE id = ?";
        $datos = array($clave, $id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    
    public function getPermisos()
    {
        $sql = "select * from permisos";
        $data = $this->selectAll($sql);
        return $data; 
    }

    public function registrarPermisos(int $id_user, int $id_permiso)
    {
        $sql = "insert into detalle_permisos (id_usuario,id_permiso) values (?,?)";
        $datos = array($id_user, $id_permiso);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = 'ok';
        }else{
            $res = 'error';
        }
        return $res;
    }

    
    public function eliminarPermisos(int $id_user)
    {
        $sql = "delete from detalle_permisos where id_usuario = ?";
        $datos = array($id_user);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = 'ok';
        }else{
            $res = 'error';
        }
        return $res;
    }
    
    public function getDetallePermisos(int $id_user)
    {
        $sql = "select * from detalle_permisos where id_usuario = $id_user";
        $data = $this->selectAll($sql);
        return $data; 
    }

    public function verificarPermiso(int $id_user, string $nombre)
    {
        $sql = "SELECT p.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario =$id_user AND p.permiso ='$nombre'";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function buscarUsuarios(int $id)
    {
        $sql = "select * from usuarios where id='$id'";
        $data = $this->select($sql);
        return $data; 
    }


}


?>
<?php
class UsuariosModel extends Query{
    private $usuario, $nombre, $clave, $documentos, $numDocumento;
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
    
}


?>
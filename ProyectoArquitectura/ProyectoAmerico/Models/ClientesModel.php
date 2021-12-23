<?php
class ClientesModel extends Query{
    private $dni, $nombre, $telefono, $direcccion, $id, $estado;
    public function _constructor()
    {
        parent::__construct();

    }
    
    public function getClientes()
    {
        $sql = "select * from clientes";
        $data = $this->selectAll($sql);
        return $data; 
    }
                                                                //id_caja = $direcccion     
    public function registrarCliente(string $dni, string $nombre, string $telefono, string $direcccion){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direcccion = $direcccion;

        ///verificamos si existe el dni
        $verificar = "select * from clientes where dni = '$this->dni'";
        $existe = $this->select($verificar);
        if(empty($existe)){
            $sql = "insert into clientes(dni, nombre, telefono, direccion) values(?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->telefono, $this->direcccion);
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

    public function modificarCliente(string $dni, string $nombre, string $telefono,string $direccion, int $id){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;
        
        
        
            $sql = "update clientes set dni=?, nombre=?, telefono=?, direccion=? where id=?";
            $datos = array($this->dni, $this->nombre, $this->telefono, $this->direccion, $this->id);
            $data=$this->save($sql, $datos);
            if ($data == 1) {
                $res = "Modificado";
            }else{
                $res = "error";
            }
        
        return $res;
    }

    public function editarCli(int $id)
    {
        $sql = "select * from clientes where id='$id'";
        $data = $this->select($sql);
        return $data;
    }

    public function accionCli(int $estado, int $id)
    {
        $this -> id = $id;
        $this -> estado = $estado;
        $sql = "UPDATE clientes SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }

    public function modificarPass(String $telefono, int $id){
        $sql = "UPDATE usuarios SET telefono = ? WHERE id = ?";
        $datos = array($telefono, $id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    
}


?>
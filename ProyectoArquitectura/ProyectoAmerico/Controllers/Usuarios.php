<?php
class Usuarios extends Controller{
    public function index()
    {
        print_r($this->model->getUsuario());
    }
}


?>
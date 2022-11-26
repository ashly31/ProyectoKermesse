<?php

class rol_usuario
{
    //Atributos 
    private $id_rol_usuario;
    private $tbl_usuario_id_usuario;
    private $tbl_rol_id_rol;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}
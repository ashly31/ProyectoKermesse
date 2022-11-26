<?php

class Tbl_rol
{
    //Atributos
    private $id_rol;
    private $id_descripcion;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
<?php

class Tbl_opciones
{
    //Atributos
    private $id_opciones;
    private $opcion_descripcion;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
     
}
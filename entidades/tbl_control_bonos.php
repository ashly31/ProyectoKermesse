<?php

class Tbl_control_bonos
{
    //Atributos
    private $id_bono;
    private $nombre;
    private $valor;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
     
}
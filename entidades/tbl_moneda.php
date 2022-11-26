<?php

class tbl_moneda
{
    //Atributos
    private $id_moneda;
    private $nombre;
    private $simbolo;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
     
}
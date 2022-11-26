<?php

class Tbl_categoria_gastos
{
    //Atributos
    private $id_categoria_gastos;
    private $nombre_categoria;
    private $descripcion;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
<?php

class Tbl_ingreso_comunidad_det
{
    //Atributos
    private $id_ingreso_comunidad_det;
    private $id_ingreso_comunidad;
    private $id_bono;
    private $denominacion;
    private $cantidad;
    private $subtotal_bono;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
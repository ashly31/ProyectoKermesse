<?php

class tbl_arqueocaja_det
{
    //Atributos
    private $idArqueoCaja_Det;
    private $idArqueoCaja;
    private $idMoneda;
    private $idDenominacion;
    private $cantidad;
    private $subtotal;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}

<?php

class Tbl_arqueocaja
{
    //Atributos
    private $id_ArqueoCaja;
    private $idKermesse;
    private $fechaArqueo;
    private $granTotal;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;
    private $fecha_eliminacion;
    private $estado;
 
    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
}
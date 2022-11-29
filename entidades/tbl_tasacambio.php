<?php

class tbl_tasacambio
{
    //Atributos
    private $id_tasaCambio;

    /**
     * @return mixed
     */
    public function getIdTasaCambio()
    {
        return $this->id_tasaCambio;
    }

    /**
     * @param mixed $id_tasaCambio
     */
    public function setIdTasaCambio($id_tasaCambio)
    {
        $this->id_tasaCambio = $id_tasaCambio;
    }
    private $id_monedaO;
    private $id_monedaC;
    private $mes;
    private $anio;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
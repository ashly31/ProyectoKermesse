<?php

class tbl_kermesse
{
    //Atributos
    private $id_kermesse;

    /**
     * @return mixed
     */
    public function getIdKermesse()
    {
        return $this->id_kermesse;
    }

    /**
     * @param mixed $id_kermesse
     */
    public function setIdKermesse($id_kermesse)
    {
        $this->id_kermesse = $id_kermesse;
    }
    private $idParroquia;
    private $nombre;
    private $finicio;
    private $fFinal;
    private $descripcion;
    private $estado;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
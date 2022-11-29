<?php

class Tbl_productos
{
    //Atributos
    private $id_producto;

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }
    private $id_comunidad;
    private $id_cat_producto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $preciov_sugerido;
    private $estado;

    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
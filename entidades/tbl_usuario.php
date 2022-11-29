<?php

class Tbl_Usuario
{
    //Atributos
    private $id_usuario;
    private $usuario;
    private $pwd;
    private $nombres;
    private $apellidos;
    private $email;
    private $estado;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }


    //METODOS
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
    
} 
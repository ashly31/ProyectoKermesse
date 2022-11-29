<?php
include_once("conexion.php");

class Dt_Opciones extends Conexion
{
    private $myCon;

    public function listarOpciones()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_opciones WHERE estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol = new Tbl_opciones();

                //_SET(CAMPOBD, atributoEntidad)
                $rol->__SET('id_opciones', $r->id_opciones);
                $rol->__SET('opcion_descripcion', $r->opcion_descripcion);
                $rol->__SET('estado', $r->estado);
                $result[] = $rol;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertOpcion(tbl_opciones $rol)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_opciones (opcion_descripcion, 
                                estado)
					VALUES(?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $rol->__GET('opcion_descripcion'),
                $rol->__GET('estado')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getOpByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_opciones WHERE id_opciones= ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $u = new Tbl_opciones();

            //_SET(CAMPOBD, atributoEntidad)
            $u->__SET('id_opciones', $r->id_opciones);
            $u->__SET('opcion_descripcion', $r->opcion_descripcion);

            $this->myCon = parent::desconectar();
            return $u;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editOpcion(tbl_opciones $tr)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_opciones SET
						opcion_descripcion= ?,
						estado = ? 
				    WHERE id_opciones = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $tr->__GET('opcion_descripcion'),
                        $tr->__GET('estado'),
                        $tr->__GET('id_opciones')
                    )
                );
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteOp($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_opciones SET
						estado = 3
				    WHERE id_opciones= ?";

            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            var_dump($e);
            die($e->getMessage());
        }
    }

}



<?php
include_once("conexion.php");

class Dt_Rol extends Conexion
{
    private $myCon;

    public function listarIngresoRoles()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_rol WHERE estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $rol = new Tbl_rol();

                //_SET(CAMPOBD, atributoEntidad)
                $rol->__SET('id_rol', $r->id_rol);
                $rol->__SET('rol_descripcion', $r->rol_descripcion);
                $rol->__SET('estado', $r->estado);
                $result[] = $rol;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertRol(tbl_rol $rol)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_rol (rol_descripcion, 
                                estado)
					VALUES(?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $rol->__GET('rol_descripcion'),
                $rol->__GET('estado')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getUserByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE id_rol= ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $u = new Tbl_rol();

            //_SET(CAMPOBD, atributoEntidad)
            $u->__SET('id_rol', $r->id_rol);
            $u->__SET('rol_descripcion', $r->rol_descripcion);

            $this->myCon = parent::desconectar();
            return $u;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editRol(tbl_rol $tr)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_rol SET
						rol_descripcion= ?,
						estado = ? 
				    WHERE id_rol = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $tr->__GET('rol_descripcion'),
                        $tr->__GET('estado'),
                        $tr->__GET('id_rol')
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

    public function deleteRol($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_rol SET
						estado = 3
				    WHERE id_rol = ?";

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

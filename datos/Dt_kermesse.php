<?php
include_once("conexion.php");


class Dt_kermesse extends Conexion
{
    private $myCon;

    public function listarKermesse()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_kermesse WHERE estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $k = new Tbl_kermesse();

                //_SET(CAMPOBD, atributoEntidad)
                $k->__SET('id_kermesse', $r->id_kermesse);
                $k->__SET('idParroquia', $r->idParroquia);
                $k->__SET('nombre', $r->nombre);
                $k->__SET('fInicio', $r->fInicio);
                $k->__SET('fFinal', $r->fFinal);
                $k->__SET('descripcion', $r->descripcion);
                $k->__SET('estado', $r->estado);
                $k->__SET('usuario_creacion', $r->usuario_creacion);
                $k->__SET('fecha_creacion', $r->fecha_creacion);
                $k->__SET('usuario_modificacion', $r->usuario_modificacion);
                $k->__SET('fecha_modificacion', $r->fecha_modificacion);
                $k->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $k->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $result[] = $k;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertKermesse(tbl_kermesse $k)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_kermesse (idParroquia, nombre, fInicio, fFinal, descripcion, estado, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion)
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $k->__GET('idParroquia'),
                $k->__GET('nombre'),
                $k->__GET('fInicio'),
                $k->__GET('fFinal'),
                $k->__GET('descripcion'),
                $k->__GET('estado'),
                $k->__GET('usuario_creacion'),
                $k->__GET('fecha_creacion'),
                $k->__GET('usuario_modificacion'),
                $k->__GET('fecha_modificacion'),
                $k->__GET('usuario_eliminacion'),
                $k->__GET('fecha_eliminacion')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getKermesseByID($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_kermesse WHERE id_kermesse = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $k = new Tbl_kermesse();

            //_SET(CAMPOBD, atributoEntidad)
            $k->__SET('id_kermesse', $r->id_kermesse);
            $k->__SET('idParroquia', $r->idParroquia);
            $k->__SET('nombre', $r->nombre);
            $k->__SET('fInicio', $r->fInicio);
            $k->__SET('fFinal', $r->fFinal);
            $k->__SET('descripcion', $r->descripcion);
            $k->__SET('estado', $r->estado);
            $k->__SET('usuario_creacion', $r->usuario_creacion);
            $k->__SET('fecha_creacion', $r->fecha_creacion);
            $k->__SET('usuario_modificacion', $r->usuario_modificacion);
            $k->__SET('fecha_modificacion', $r->fecha_modificacion);
            $k->__SET('usuario_eliminacion', $r->usuario_eliminacion);
            $k->__SET('fecha_eliminacion', $r->fecha_eliminacion);

            $this->myCon = parent::desconectar();
            return $k;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editKermesse(tbl_kermesse $tk)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_kermesse SET
						idParroquia = ?,
						nombre = ?, 
						fInicio = ?, 
						fFinal = ?,
						descripcion = ?,
						estado = ?,
						usuario_creacion = ?,
						fecha_creacion = ?,
						usuario_modificacion = ?,
						fecha_modificacion = ?
				    WHERE id_kermesse = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        //$tu->__GET('usuario'),
                        $tk->__GET('idParroquia'),
                        $tk->__GET('nombre'),
                        $tk->__GET('fInicio'),
                        $tk->__GET('fFinal'),
                        $tk->__GET('descripcion'),
                        $tk->__GET('estado'),
                        $tk->__GET('usuario_creacion'),
                        $tk->__GET('fecha_creacion'),
                        $tk->__GET('usuario_modificacion'),
                        $tk->__GET('fecha_modificacion'),
                        $tk->__GET('id_kermesse')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteKermesse($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_kermesse SET
						estado = 3
				    WHERE id_kermesse = ?";

            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }
}
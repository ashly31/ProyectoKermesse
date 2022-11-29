<?php
include_once("conexion.php");


class Dt_ingresoComunidad_det extends Conexion
{
    private $myCon;

    public function listarIngresoComunidad_det()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_ingreso_comunidad_det;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $icd = new Tbl_ingreso_comunidad_det();

                //_SET(CAMPOBD, atributoEntidad)
                $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
                $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $icd->__SET('id_bono', $r->id_bono);
                $icd->__SET('denominacion', $r->denominacion);
                $icd->__SET('cantidad', $r->cantidad);
                $icd->__SET('subtotal_bono', $r->subtotal_bono);
                $result[] = $icd;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function insertIngresoCD(tbl_ingreso_comunidad_det $icd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad_det (id_ingreso_comunidad, id_bono, denominacion, cantidad, subtotal_bono)
					VALUES(?,?,?,?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $icd->__GET('id_ingreso_comunidad'),
                $icd->__GET('id_bono'),
                $icd->__GET('denominacion'),
                $icd->__GET('cantidad'),
                $icd->__GET('subtotal_bono')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getIngresoCDByID($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad_det WHERE id_ingreso_comunidad_det = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $icd = new Tbl_ingreso_comunidad_det();

            //_SET(CAMPOBD, atributoEntidad)
            $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
            $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
            $icd->__SET('id_bono', $r->id_bono);
            $icd->__SET('denominacion', $r->denominacion);
            $icd->__SET('cantidad', $r->cantidad);
            $icd->__SET('subtotal_bono', $r->subtotal_bono);



            $this->myCon = parent::desconectar();
            return $icd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editIngresoCD(tbl_ingreso_comunidad_det $ticd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_ingreso_comunidad_det SET
						id_ingreso_comunidad = ?,
						id_bono = ?, 
						denominacion = ?, 
						cantidad = ?,
						subtotal_bono = ?
				    WHERE id_ingreso_comunidad_det = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        //$tu->__GET('usuario'),
                        $ticd->__GET('id_ingreso_comunidad'),
                        $ticd->__GET('id_bono'),
                        $ticd->__GET('denominacion'),
                        $ticd->__GET('cantidad'),
                        $ticd->__GET('subtotal_bono'),
                        $ticd->__GET('id_ingreso_comunidad_det')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteIngresoCD($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "DELETE FROM dbkermesse.tbl_ingreso_comunidad_det
				    WHERE id_ingreso_comunidad_det = ?";

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
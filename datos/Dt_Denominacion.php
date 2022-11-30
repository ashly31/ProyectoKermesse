<?php
include_once("conexion.php");



class Dt_Denominacion extends Conexion
{
    private $myCon;

    public function listarDenominacion()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_denominacion where estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $d = new Tbl_denominacion();

                //_SET(CAMPOBD, atributoEntidad)
                $d->__SET('id_Denominacion', $r->id_Denominacion);
                $d->__SET('idMoneda', $r->idMoneda);
                $d->__SET('valor', $r->valor);
                $d->__SET('valor_letras', $r->valor_letras);
                $d->__SET('estado', $r->estado);
                $result[] = $d;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertDeno(tbl_denominacion $d)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_denominacion (idMoneda, valor, valor_letras, estado)
					VALUES(?,?,?,1)";

            $this->myCon->prepare($sql)->execute(array(
                $d->__GET('idMoneda'),
                $d->__GET('valor'),
                $d->__GET('valor_letras')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getDenoByID($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_denominacion WHERE id_Denominacion = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $d = new Tbl_denominacion();

            //_SET(CAMPOBD, atributoEntidad)
            $d->__SET('id_Denominacion', $r->id_Denominacion);
            $d->__SET('idMoneda', $r->idMoneda);
            $d->__SET('valor', $r->valor);
            $d->__SET('valor_letras', $r->valor_letras);
            $d->__SET('estado', $r->estado);


            $this->myCon = parent::desconectar();
            return $d;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editDeno(tbl_denominacion $td)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_denominacion SET
						idMoneda = ?,
						valor = ?, 
						valor_letras = ?, 
						estado = 2
				    WHERE id_Denominacion = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $td->__GET('idMoneda'),
                        $td->__GET('valor'),
                        $td->__GET('valor_letras'),
                        $td->__GET('id_Denominacion')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteDeno($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_denominacion SET
						estado = 3
				    WHERE id_Denominacion = ?";

            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }
}
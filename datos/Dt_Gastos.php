<?php
include_once("conexion.php");


class Dt_Gastos extends Conexion
{
    private $myCon;

    public function listarGastos()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_gastos where estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $g = new Tbl_gastos();

                //_SET(CAMPOBD, atributoEntidad)
                $g->__SET('id_registro_gastos', $r->id_registro_gastos);
                $g->__SET('idKermesse', $r->idKermesse);
                $g->__SET('idCatGastos', $r->idCatGastos);
                $g->__SET('fechaGasto', $r->fechaGasto);
                $g->__SET('concepto', $r->concepto);
                $g->__SET('monto', $r->monto);
                $g->__SET('usuario_creacion', $r->usuario_creacion);
                $g->__SET('fecha_creacion', $r->fecha_creacion);
                $g->__SET('usuario_modificacion', $r->usuario_modificacion);
                $g->__SET('fecha_modificacion', $r->fecha_modificacion);
                $g->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $g->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $g->__SET('estado', $r->estado);


                $result[] = $g;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertGastos(tbl_gastos $g)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_gastos (idKermesse, idCatGastos, fechaGasto, concepto, monto, usuario_creacion, fecha_creacion)
					VALUES(?,?,?,?,?,?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $g->__GET('idKermesse'),
                $g->__GET('idCatGastos'),
                $g->__GET('fechaGasto'),
                $g->__GET('concepto'),
                $g->__GET('monto'),
                $g->__GET('usuario_creacion'),
                $g->__GET('fecha_creacion')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getGastosByID($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_gastos WHERE id_registro_gastos = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $g = new Tbl_gastos();

            //_SET(CAMPOBD, atributoEntidad)
            $g->__SET('id_registro_gastos', $r->id_registro_gastos);
            $g->__SET('idKermesse', $r->idKermesse);
            $g->__SET('idCatGastos', $r->idCatGastos);
            $g->__SET('fechaGasto', $r->fechaGasto);
            $g->__SET('concepto', $r->concepto);
            $g->__SET('monto', $r->monto);
            $g->__SET('usuario_creacion', $r->usuario_creacion);
            $g->__SET('fecha_creacion', $r->fecha_creacion);
            $g->__SET('usuario_modificacion', $r->usuario_modificacion);
            $g->__SET('fecha_modificacion', $r->fecha_modificacion);
            $g->__SET('usuario_eliminacion', $r->usuario_eliminacion);
            $g->__SET('fecha_eliminacion', $r->fecha_eliminacion);
            $g->__SET('estado', $r->estado);


            $this->myCon = parent::desconectar();
            return $g;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editGastos(tbl_gastos $tg)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_gastos SET
						idKermesse = ?,
						idCatGastos = ?, 
						fechaGasto = ?, 
						concepto = ?,
						monto = ?,
						usuario_modificacion = ?,
						fecha_modificacion = ?,
						estado = 2						
				    WHERE id_registro_gastos = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        //$tu->__GET('usuario'),
                        $tg->__GET('idKermesse'),
                        $tg->__GET('idCatGastos'),
                        $tg->__GET('fechaGasto'),
                        $tg->__GET('concepto'),
                        $tg->__GET('monto'),
                        $tg->__GET('usuario_modificacion'),
                        $tg->__GET('fecha_modificacion')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_gastos SET
						estado = 3
				    WHERE id_registro_gastos = ?";

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

<?php
include_once("conexion.php");


class Dt_Tasacambio extends Conexion
{
    private $myCon;

    public function listarTasacambio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_tasacambio where estado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$tc = new tbl_tasacambio();

				//_SET(CAMPOBD, atributoEntidad)			
				$tc->__SET('id_tasaCambio', $r->id_tasaCambio);
				$tc->__SET('id_monedaO', $r->id_monedaO);
				$tc->__SET('id_monedaC', $r->id_monedaC);
                $tc->__SET('mes', $r->mes);
				$tc->__SET('anio', $r->anio);
				$tc->__SET('estado', $r->estado);
				$result[] = $tc;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertTc(tbl_tasacambio $tc){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_tasacambio (id_monedaO, id_monedaC, mes, anio, estado)
					VALUES(?,?,?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$tc->__GET('id_monedaO'),
				$tc->__GET('id_monedaC'),
				$tc->__GET('mes'),
				$tc->__GET('anio'),
				$tc->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	}

    public function getTcByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_tasacambio WHERE id_tasaCambio= ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $u = new Tbl_tasacambio();

            //_SET(CAMPOBD, atributoEntidad)
            $u->__SET('id_tasaCambio', $r->id_tasaCambio);
            $u->__SET('id_monedaO', $r->id_monedaO);
            $u->__SET('id_monedaC', $r->id_monedaC);
            $u->__SET('mes', $r->mes);
            $u->__SET('anio', $r->anio);


            $this->myCon = parent::desconectar();
            return $u;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editTc(tbl_tasacambio $tc)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_tasacambio SET
						id_monedaO = ?,
						id_monedaC = ?, 
						mes = ?, 
						anio = ?, 
						estado = ?
				    WHERE id_tasaCambio = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $tc->__GET('id_monedaO'),
                        $tc->__GET('id_monedaC'),
                        $tc->__GET('mes'),
                        $tc->__GET('anio'),
                        $tc->__GET('estado'),
                        $tc->__GET('id_tasaCambio')));

            $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            var_dump($e);
            die($e->getMessage());
        }
    }
    public function deleteTc($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_tasacambio SET
						estado = 3
				    WHERE id_tasaCambio = ?";

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
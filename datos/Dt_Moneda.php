<?php
include_once("conexion.php");


class Dt_Moneda extends Conexion
{
    private $myCon;

    public function listarMoneda(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * from dbkermesse.tbl_moneda where estado<> 3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$m = new tbl_moneda();

				//_SET(CAMPOBD, atributoEntidad)			
				$m->__SET('id_moneda', $r->id_moneda);
				$m->__SET('nombre', $r->nombre);
				$m->__SET('simbolo', $r->simbolo);
				$m->__SET('estado', $r->estado);
				$result[] = $m;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	 public function insertarMoneda(tbl_moneda $m)
	 {
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_moneda (nombre, simbolo, estado)
					VALUES(?,?,?)";
			
			$this->myCon->prepare($sql)
			 ->execute(array(
				$m->__GET('nombre'),
				$m->__GET('simbolo'),
				$m->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	} 

	public function getMonByID($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_moneda WHERE id_moneda = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$mon = new tbl_moneda();

			//_SET(CAMPOBD, atributoEntidad)
			$mon->__SET('id_moneda', $r->id_moneda);
			$mon->__SET('nombre', $r->nombre);
			$mon->__SET('simbolo', $r->simbolo);

			$this->myCon = parent::desconectar();
			return $mon;
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editMoneda(tbl_moneda $m)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_moneda SET
						nombre =?,
						simbolo = ?,
						estado = ?
					WHERE id_moneda = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$m->__GET('nombre'),
					$m->__GET('simbolo'),
					$m->__GET('estado'),
					$m->__GET('id_moneda')
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

	public function deleteMoneda($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_moneda SET
						estado = 3
				    WHERE id_moneda = ?";

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
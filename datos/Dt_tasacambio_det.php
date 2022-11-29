<?php
include_once("conexion.php");

class Dt_tasacambio_det extends Conexion
{
    private $myCon;

    public function listarTasacambioDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tasacambio_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$tcd = new Tasacambio_det();

				//_SET(CAMPOBD, atributoEntidad)			
				$tcd->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
				$tcd->__SET('id_tasaCambio', $r->id_tasaCambio);
				$tcd->__SET('fecha', $r->fecha);
                $tcd->__SET('tipoCambio', $r->tipoCambio);
				$result[] = $tcd;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarTasaCambioDet(Tasacambio_det $tcd){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tasacambio_det (id_tasaCambio_det,id_tasaCambio,fecha,tipoCambio)
					VALUES(?,?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$tcd->__GET('id_tasaCambio_det'),
				$tcd->__GET('id_tasaCambio'),
				$tcd->__GET('fecha'),
				$tcd->__GET('tipoCambio'),
			));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	} 
	public function getTasaCDetByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tasacambio_det 
						WHERE id_tasaCambio_det = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tcd = new Tasacambio_det();

			//_SET(CAMPOBD, atributoEntidad)			
			$tcd->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
			$tcd->__SET('id_tasaCambio', $r->id_tasaCambio);
			$tcd->__SET('fecha', $r->fecha);
			$tcd->__SET('tipoCambio', $r->tipoCambio);

			$this->myCon = parent::desconectar();
			return $tcd;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function editarTasaCambioDet(Tasacambio_det $tcd)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE FROM dbkermesse.tasacambio_det SET 
						id_tasaCambio = ?,
						fecha = ?,
						tipoCambio= ?
				    WHERE id_tasaCambio_det = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$tcd->__GET('id_tasaCambio'), 
					$tcd->__GET('fecha'),
					$tcd->__GET('tipoCambio')
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
	public function eliminarTasaCambioDet($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "DELETE FROM dbkermesse.tasacambio_det
							  WHERE id_tasaCambio_det = ?";

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

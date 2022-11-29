<?php
include_once("conexion.php");

class Dt_Parroquia extends Conexion
{
    private $myCon;

    public function listarParroquia(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * from dbkermesse.tbl_parroquia;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$pq = new Tbl_parroquia();

				//_SET(CAMPOBD, atributoEntidad)			
				$pq->__SET('idParroquia', $r->idParroquia);
				$pq->__SET('nombre', $r->nombre);
				$pq->__SET('direccion', $r->direccion);
				$pq->__SET('telefono', $r->telefono);
				$pq->__SET('parroco', $r->parroco);
				$pq->__SET('logo', $r->logo);
				$pq->__SET('sitio_web', $r->sitio_web);
				$result[] = $pq;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarParroquia(Tbl_parroquia $pq)
	 {
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_parroquia (idParroquia, nombre, direccion, telefono, 
				parroco, logo, sitio_web)
					VALUES(?,?,?,?,?,?,?)";
			
			$this->myCon->prepare($sql)
			 ->execute(array(
				$pq->__GET('idParroquia'),
				$pq->__GET('nombre'),
				$pq->__GET('direccion'),
				$pq->__GET('telefono'),
				$pq->__GET('parroco'),
				$pq->__GET('logo'),
				$pq->__GET('sitio_web')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function getPqByID($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_parroquia WHERE idParroquia = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$pqa = new Tbl_parroquia;

			//_SET(CAMPOBD, atributoEntidad)
			$pqa->__SET('idParroquia', $r->idParroquia);
			$pqa->__SET('nombre', $r->nombre);
			$pqa->__SET('direccion', $r->direccion);
			$pqa->__SET('telefono', $r->telefono);
			$pqa->__SET('parroco', $r->parroco);
			$pqa->__SET('logo', $r->logo);
			$pqa->__SET('sitio_web', $r->sitio_web);

			$this->myCon = parent::desconectar();
			return $pqa;
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editParroquia(Tbl_parroquia $pq)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_parroquia SET
						nombre =?,
						direccion = ?,
						telefono = ?,
						parroco = ?,
						logo = ?,
						sitio_web = ?
					WHERE idParroquia = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$pq->__GET('nombre'),
				    $pq->__GET('direccion'),
				    $pq->__GET('telefono'),
				    $pq->__GET('parroco'),
				    $pq->__GET('logo'),
				    $pq->__GET('sitio_web'),
					$pq->__GET('idParroquia')
				));
				 $this->myCon = parent::desconectar();
		}
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}
	
	public function deletePq($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "DELETE FROM dbkermesse.tbl_parroquia 						
				    WHERE idParroquia = ?";

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

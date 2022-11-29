<?php
include_once("conexion.php");


class Dt_Opciones extends Conexion
{
    private $myCon;

    public function listarOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_opciones where estado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$op = new Tbl_opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$op->__SET('id_opciones', $r->id_opciones);
				$op->__SET('opcion_descripcion', $r->opcion_descripcion);
				$op->__SET('estado', $r->estado);
				$result[] = $op;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarOpciones(Tbl_opciones $op)
	 {
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_opciones (id_opciones, opcion_descripcion, estado)
					VALUES(?,?,?)";
			
			$this->myCon->prepare($sql)
			 ->execute(array(
				$op->__GET('id_opciones'),
				$op->__GET('opcion_descripcion'),
				$op->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	} 

	public function getOpByID($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_opciones WHERE id_opciones = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$opc = new Tbl_opciones;

			//_SET(CAMPOBD, atributoEntidad)
			$opc->__SET('id_opciones', $r->id_opciones);
			$opc->__SET('opcion_descripcion', $r->opcion_descripcion);
			$opc->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $opc;
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

	public function editOpciones(Tbl_opciones $op)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_opciones SET
						opcion_descripcion =?,
						estado = ?
					WHERE id_opciones = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$op->__GET('opcion_descripcion'),
					$op->__GET('estado'),
					$op->__GET('id_opciones')
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
				    WHERE id_opciones = ?";

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


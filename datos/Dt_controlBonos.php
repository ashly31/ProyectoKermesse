<?php
include_once("conexion.php");

class Dt_controlBonos extends Conexion
{
    private $myCon;

    public function listarControlBonos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_control_bonos where estado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cb = new Tbl_control_bonos();

				//_SET(CAMPOBD, atributoEntidad)			
				$cb->__SET('id_bono', $r->id_bono);
				$cb->__SET('nombre', $r->nombre);
				$cb->__SET('valor', $r->valor);
				$cb->__SET('estado', $r->estado);
				$result[] = $cb;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertar_ControlBonos(Tbl_control_bonos $cb){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_control_bonos (id_bono,nombre,valor,estado)
					VALUES(?,?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$cb->__GET('id_bono'),
				$cb->__GET('nombre'),
				$cb->__GET('valor'),
				$cb->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function getCBonosByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos WHERE id_bono = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tcb = new Tbl_control_bonos();

			//_SET(CAMPOBD, atributoEntidad)			
			$tcb->__SET('id_bono', $r->id_bono);
			$tcb->__SET('nombre', $r->nombre);
			$tcb->__SET('valor', $r->valor);

			$this->myCon = parent::desconectar();
			return $tcb;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function editar_ControlBonos(Tbl_control_bonos $tcb)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_control_bonos SET 
						nombre = ?,
						valor = ?,
						estado = ?
				    WHERE id_bono = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$tcb->__GET('nombre'), 
					$tcb->__GET('valor'),
					$tcb->__GET('estado'),
					$tcb->__GET('id_bono')
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
	public function eliminar_ControlBonos($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_control_bonos SET
						estado = 3
				    WHERE id_bono = ?";

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
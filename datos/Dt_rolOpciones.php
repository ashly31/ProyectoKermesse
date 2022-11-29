<?php
include_once("conexion.php");

class Dt_rolOpciones extends Conexion
{
    private $myCon;

    public function listarRolOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_opciones;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$ro = new rol_opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$ro->__SET('id_rol_opciones', $r->id_rol_opciones);
				$ro->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
				$ro->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
				$result[] = $ro;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertar_rolOpciones(rol_opciones $rc){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.rol_opciones (id_rol_opciones, tbl_rol_id_rol, tbl_opciones_id_opciones)
					VALUES(?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$rc->__GET('id_rol_opciones'),
				$rc->__GET('tbl_rol_id_rol'),
				$rc->__GET('tbl_opciones_id_opciones')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	} 
	public function getRolByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.rol_opciones WHERE id_rol_opciones = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tro= new rol_opciones();

			//_SET(CAMPOBD, atributoEntidad)			
			$tro->__SET('id_rol_opciones', $r->id_rol_opciones);
			$tro->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
			$tro->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);

			$this->myCon = parent::desconectar();
			return $tro;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function editar_rolOpciones(rol_opciones $tro)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.rol_opciones SET 
						tbl_rol_id_rol = ?,
						tbl_opciones_id_opciones = ?
				    WHERE id_rol_opciones = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$tro->__GET('tbl_rol_id_rol'), 
					$tro->__GET('tbl_opciones_id_opciones'),
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
	public function eliminar_rolOpciones($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.rol_opciones SET
						estado = 3
				    WHERE id_rol_opciones = ?";

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
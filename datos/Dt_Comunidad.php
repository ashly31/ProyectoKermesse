<?php
include_once("conexion.php");

class Dt_Comunidad extends Conexion
{
    private $myCon;

    public function listarComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_comunidad where estado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_comunidad', $r->id_comunidad);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('responsable', $r->responsable);
				$c->__SET('desc_contribucion', $r->desc_contribucion);
				$c->__SET('estado', $r->estado);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertar_Comunidad(Tbl_comunidad $com){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_comunidad(id_comunidad,nombre, responsable, desc_contribucion, estado)
					VALUES(?,?,?,?,?)";
			
			$this->myCon->prepare($sql)
			->execute(array(
				$com->__GET('id_comunidad'),
				$com->__GET('nombre'),
				$com->__GET('responsable'),
				$com->__GET('desc_contribucion'),
				$com->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}
		catch (Exception $e){
			die($e->getMessage());
		}
	}
	public function getComByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_comunidad WHERE id_comunidad = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$c = new Tbl_comunidad();

			//_SET(CAMPOBD, atributoEntidad)			
			$c->__SET('id_comunidad', $r->id_comunidad);
			$c->__SET('nombre', $r->nombre);
			$c->__SET('responsable', $r->responsable);
			$c->__SET('desc_contribucion', $r->desc_contribucion);

			$this->myCon = parent::desconectar();
			return $c;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function editar_Comunidad(Tbl_comunidad $tc)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE  dbkermesse.tbl_comunidad SET 
						nombre = ?, 
						responsable = ?,
						desc_contribucion = ?,
						estado = ?
				    WHERE id_comunidad = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$tc->__GET('nombre'), 
					$tc->__GET('responsable'),
					$tc->__GET('desc_contribucion'),
					$tc->__GET('estado'),
					$tc->__GET('id_comunidad')
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
	public function eliminar_Comunidad($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE FROM dbkermesse.tbl_comunidad SET
						estado = 3
				    WHERE id_comunidad = ?";

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

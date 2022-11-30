<?php
include_once("conexion.php");

class Dt_rolUsuario extends Conexion
{
    private $myCon;

    public function listarRolUsuario(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$ru = new rol_usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$ru->__SET('id_rol_usuario', $r->id_rol_usuario);
				$ru->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
				$ru->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
				$result[] = $ru;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarRU(rol_usuario $ru)
	{
	   try{
		   $this->myCon = parent::conectar();
		   $sql = "INSERT INTO dbkermesse.rol_usuario (tbl_usuario_id_usuario, tbl_rol_id_rol)
				   VALUES(?,?)";
		   
		   $this->myCon->prepare($sql)
			->execute(array(
			   $ru->__GET('tbl_usuario_id_usuario'),
			   $ru->__GET('tbl_rol_id_rol')));
		   
		   $this->myCon = parent::desconectar();

	   }catch (Exception $e){
		   die($e->getMessage());
	   }
   } 

   public function getRUByID($id)
   {
	   try
	   {
		   $this->myCon = parent::conectar();
		   $querySQL = "SELECT * FROM dbkermesse.rol_usuario WHERE id_rol_usuario = ?;";
		   $stm = $this->myCon->prepare($querySQL);
		   $stm->execute(array($id));

		   $r = $stm->fetch(PDO::FETCH_OBJ);

		   $tru = new rol_usuario();

		   //_SET(CAMPOBD, atributoEntidad)
		   $tru->__SET('id_rol_usuario', $r->id_rol_usuario);
		   $tru->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
		   $tru->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

		   $this->myCon = parent::desconectar();
		   return $tru;
	   }
	   catch (Exception $e) 
	   {
		   die($e->getMessage());
	   }
   }

   public function editRU(rol_usuario $tru)
   {
	   try
	   {
		   $this->myCon = parent::conectar();
		   $sql = "UPDATE dbkermesse.rol_usuario SET
					   tbl_usuario_id_usuario =?,
					   tbl_rol_id_rol = ?
				   WHERE id_rol_usuario = ?";

			   $this->myCon->prepare($sql)
				->execute(
			   array(
				   $tru->__GET('tbl_usuario_id_usuario'),
				   $tru->__GET('tbl_rol_id_rol'),
				   $tru->__GET('id_rol_usuario')
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

   public function deleteRU($id)
   {
	   try
	   {
		   $this->myCon = parent::conectar();
		   $sql = "DELETE FROM dbkermesse.rol_usuario 
				   WHERE id_rol_usuario = ?";

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

	

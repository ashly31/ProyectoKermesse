<?php
include_once("conexion.php");

class Dt_listaPrecio extends Conexion
{
	private $myCon;

	public function listarLP()
	{

		try {
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT* from dbkermesse.tbl_lista_precio WHERE estado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
				$p = new Tbl_lista_precio();

				//_SET(CAMPOBD, atributoEntidad)			
				$p->__SET('id_lista_precio', $r->id_lista_precio);
				$p->__SET('id_kermesse', $r->id_kermesse);
				$p->__SET('nombre', $r->nombre);
				$p->__SET('descripcion', $r->descripcion);
				$p->__SET('estado', $r->estado);
				$result[] = $p;
			}
			$this->myCon = parent::desconectar();
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insertLP(Tbl_lista_precio $prod)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_lista_precio (id_kermesse, nombre, descripcion, estado)
					VALUES(?,?,?,?)";

			$this->myCon->prepare($sql)->execute(array(
				$prod->__GET('id_kermesse'),
				$prod->__GET('nombre'),
				$prod->__GET('descripcion'),
				$prod->__GET('estado')
			));

			$this->myCon = parent::desconectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getLPByID($id)
	{
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio WHERE id_lista_precio= ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$prod = new Tbl_lista_precio();

			//_SET(CAMPOBD, atributoEntidad)
			$prod->__SET('id_lista_precio', $r->id_lista_precio);
			$prod->__SET('id_kermesse', $r->id_kermesse);
			$prod->__SET('nombre', $r->nombre);
			$prod->__SET('descripcion', $r->descripcion);

			$this->myCon = parent::desconectar();
			return $prod;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editLP(Tbl_lista_precio $prod)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_lista_precio SET
						id_kermesse= ?,
						nombre = ?,
						descripcion = ?,
						estado = ?
				    WHERE id_lista_precio = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$prod->__GET('id_kermesse'),
						$prod->__GET('nombre'),
						$prod->__GET('descripcion'),
						$prod->__GET('estado'),
						$prod->__GET('id_lista_precio')
					)
				);
			$this->myCon = parent::desconectar();
		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteLp($id)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_lista_precio SET
						estado = 3
				    WHERE id_lista_precio = ?";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();
		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}
}

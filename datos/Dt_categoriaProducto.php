<?php
include_once("conexion.php");
include_once("./entidades/tbl_categoria_producto.php");


class Dt_categoriaProducto extends Conexion
{
    private $myCon;

    public function listarCategoriaProducto(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_producto;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cp = new Tbl_categoria_producto();

				//_SET(CAMPOBD, atributoEntidad)			
				$cp->__SET('id_categoria_producto', $r->id_categoria_producto);
				$cp->__SET('nombre', $r->nombre);
				$cp->__SET('descripcion', $r->descripcion);
				$cp->__SET('estado', $r->estado);
				$result[] = $cp;
			}
			$this->myCon = parent::desconectar();
			return $result;
		} 
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertCP(Tbl_categoria_producto $cp)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_categoria_producto (id_categoria_producto, nombre, 
			descripcion, estado) 
		        VALUES (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $cp->__GET('id_categoria_producto'),
			 $cp->__GET('nombre'),
			 $cp->__GET('descripcion'),
			 $cp->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getCPByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto WHERE id_categoria_producto = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$cp = new Tbl_categoria_producto();

			//_SET(CAMPOBD, atributoEntidad)			
			$cp->__SET('id_categoria_producto', $r->id_categoria_producto);
			$cp->__SET('nombre', $r->nombre);
			$cp->__SET('descripcion', $r->descripcon);
			$cp->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $cp;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editCP(Tbl_categoria_producto $cp)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_producto SET
						nombre = ?, 
						descripcion = ?, 
						estado = ?,
						
				    WHERE id_categoria_producto = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$cp->__GET('id_categoria_producto'), 
					$cp->__GET('nombre'), 
					$cp->__GET('descripcion'),
					$cp->__GET('esatdo'),
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

	public function deleteCP($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_producto SET
						estado = 3
				    WHERE id_categoria_producto = ?";

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
/*
$prueba = new Dt_usuario();
$element = $prueba->listarIngresoUsuario();
foreach($element as $value){
    echo "<br>";
    echo $value->id_usuario;
    echo $value->usuario;
    echo $value->pwd;
    echo $value->nombres;
    echo $value->apellidos;
    echo $value->email;
    echo $value->estado;
}
*/
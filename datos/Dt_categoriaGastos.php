<?php
include_once("conexion.php");


class Dt_categoriaGastos extends Conexion
{
    private $myCon;

    public function listarCategoriaGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_gastos where estado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cg = new tbl_categoria_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$cg->__SET('id_categoria_gastos', $r->id_categoria_gastos);
				$cg->__SET('nombre_categoria', $r->nombre_categoria);
				$cg->__SET('descripcion', $r->descripcion);
				$cg->__SET('estado', $r->estado);
				$result[] = $cg;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertCG(tbl_categoria_gastos $cg)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_categoria_gastos (nombre_categoria, 
			descripcion, estado) 
		        VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $cg->__GET('nombre_categoria'),
			 $cg->__GET('descripcion'),
			 $cg->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getCGByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos WHERE id_categoria_gastos = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$tcg = new Tbl_categoria_gastos();

			//_SET(CAMPOBD, atributoEntidad)			
			$tcg->__SET('id_categoria_gastos', $r->id_categoria_gastos);
			$tcg->__SET('nombre_categoria', $r->nombre_categoria);
			$tcg->__SET('descripcion', $r->descripcion);
			

			$this->myCon = parent::desconectar();
			return $tcg;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editCG(Tbl_categoria_gastos $cg)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
						nombre_categoria = ?, 
						descripcion = ?, 
						estado = ?
				    WHERE id_categoria_gastos = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$cg->__GET('nombre_categoria'), 
					$cg->__GET('descripcion'), 
					$cg->__GET('estado'),
					$cg->__GET('id_categoria_gastos')
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

	public function deleteCG($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
						estado = 3
				    WHERE id_categoria_gastos = ?";

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
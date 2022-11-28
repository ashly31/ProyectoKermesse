<?php
include_once("conexion.php");



class Dt_listaPrecio extends Conexion
{
    private $myCon;

    public function listarListaPrecio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_lista_precio;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$lp = new Tbl_lista_precio();

				//_SET(CAMPOBD, atributoEntidad)			
				$lp->__SET('id_lista_precio', $r->id_lista_precio);
				$lp->__SET('id_kermesse', $r->id_kermesse);
				$lp->__SET('nombre', $r->nombre);
				$lp->__SET('descripcion', $r->descripcion);
				$lp->__SET('estado', $r->estado);
				$result[] = $lp;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarLP(Tbl_lista_precio $lp)
	{
	   try{
		   $this->myCon = parent::conectar();
		   $sql = "INSERT INTO dbkermesse.tbl_lista_precio (id_lista_precio, id_kermesse, 
		   nombre, descripcion, estado)
				   VALUES(?,?,?,?,?)";
		   
		   $this->myCon->prepare($sql)
			->execute(array(
			   $lp->__GET('id_lista_precio'),
			   $lp->__GET('id_kermesse'),
			   $lp->__GET('nombre'),
			   $lp->__GET('descripcion'),
			   $lp->__GET('estado')));
		   
		   $this->myCon = parent::desconectar();

	   }catch (Exception $e){
		   die($e->getMessage());
	   }
   } 

   public function getLPByID($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio WHERE id_lista_precio = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$listp = new Tbl_lista_precio();

			//_SET(CAMPOBD, atributoEntidad)
			$listp->__SET('id_lista_precio', $r->id_lista_precio);
			$listp->__SET('id_kermesse', $r->id_kermesse);
			$listp->__SET('nombre', $r->nombre);
			$listp->__SET('descripcion', $r->descripcion);
			$listp->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $listp;
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editLP(Tbl_lista_precio $lp)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_lista_precio SET
						id_kermesse =?,
						nombre =?,
						descripcion = ?,
						estado = ?
					WHERE id_lista_precio = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$lp->__GET('id_kermesse'),
			        $lp->__GET('nombre'),
			        $lp->__GET('descripcion'),
			        $lp->__GET('estado'),
					$lp->__GET('id_lista_precio')	
				));
				 $this->myCon = parent::desconectar();
		}
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteLP($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_lista_precio SET
						estado = 3
				    WHERE id_lista_precio = ?";

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
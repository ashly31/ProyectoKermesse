<?php
include_once("conexion.php");



class Dt_listaPrecioDet extends Conexion
{
    private $myCon;

    public function listarListaPrecioDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_listaprecio_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$lpd = new Tbl_listaprecio_det();

				//_SET(CAMPOBD, atributoEntidad)			
				$lpd->__SET('id_listaprecio_det', $r->id_listaprecio_det);
				$lpd->__SET('id_lista_precio', $r->id_lista_precio);
				$lpd->__SET('id_producto', $r->id_producto);
				$lpd->__SET('precio_venta', $r->precio_venta);
			
				$result[] = $lpd;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarLPDet(Tbl_listaprecio_det $lpd)
	 {
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_listaprecio_det (id_listaprecio_det, id_lista_precio,
			id_producto, precio_venta)
					VALUES(?,?,?,?)";
			
			$this->myCon->prepare($sql)
			 ->execute(array(
				$lpd->__GET('id_listaprecio_det'),
				$lpd->__GET('id_lista_precio'),
				$lpd->__GET('id_producto'),
				$lpd->__GET('precio_venta')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function getLPDByID($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio_det WHERE id_listaprecio_det = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);

			$listpd = new Tbl_listaprecio_det;

			//_SET(CAMPOBD, atributoEntidad)
			$listpd->__SET('id_listaprecio_det', $r->id_listaprecio_det);
			$listpd->__SET('id_lista_precio', $r->id_lista_precio);
			$listpd->__SET('id_producto', $r->id_producto);
			$listpd->__SET('precio_venta', $r->precio_venta);
			

			$this->myCon = parent::desconectar();
			return $listpd;
		}
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editLPDet(Tbl_listaprecio_det $lpd)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_listaprecio_det SET
						id_lista_precio =?,
						id_producto = ?,
						precio_venta = ?,
						
					WHERE id_listaprecio_det = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$lpd->__GET('id_lista_precio'),
				    $lpd->__GET('id_producto'),
				    $lpd->__GET('precio_venta'),
				   
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

	public function deleteLPDet($id)
	{
		try
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_listaprecio_det SET
						estado = 3
				    WHERE id_listaprecio_det = ?";

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
<?php
include_once("conexion.php");
include_once("./entidades/tbl_arqueocaja_det.php");


class Dt_arqueoCaja_det extends Conexion
{
    private $myCon; 

    public function listarArqueocajaDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_arqueocaja_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$acd = new tbl_arqueocaja_det();

				//_SET(CAMPOBD, atributoEntidad)			
				$acd->__SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
				$acd->__SET('idArqueoCaja', $r->idArqueoCaja);
				$acd->__SET('idMoneda', $r->idMoneda);
				$acd->__SET('idDenominacion', $r->idDenominacion);
				$acd->__SET('cantidad', $r->cantidad);
				$acd->__SET('subtotal', $r->subtotal);
				$result[] = $acd;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertACD(tbl_arqueocaja_det $acd)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_arqueocaja_det (id_ArqueoCaja_Det, idArqueoCaja, idMoneda,
			idDenominacion, cantidad, subtotal) 
		        VALUES (?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $acd->__GET('id_ArqueoCaja_Det'),
			 $acd->__GET('idArqueoCaja'),
			 $acd->__GET('idMoneda'),
			 $acd->__GET('idDenominacion'),
			 $acd->__GET('cantidad'),
			 $acd->__GET('subtotal')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getACDByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det WHERE id_ArqueoCaja_Det = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$acd = new tbl_arqueocaja_det();

			//_SET(CAMPOBD, atributoEntidad)			
			$acd->__SET('id_ArqueoCaja_Det', $r->id_ArqueoCaja_Det);
			$acd->__SET('idArqueoCaja', $r->idArqueoCaja);
			$acd->__SET('idMoneda', $r->idMoneda);
			$acd->__SET('idDenominacion', $r->idDenominacion);
			$acd->__SET('cantidad', $r->cantidad);
			$acd->__SET('subtotal', $r->subtotal);

			$this->myCon = parent::desconectar();
			return $acd;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editACD(tbl_arqueocaja_det $acd)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_arqueocaja_det SET
						idArqueoCaja = ?, 
						idMoneda = ?, 
						idDenominacion = ?,
						cantidad = ?,
						subtotal = ?,
						
				    WHERE id_ArqueoCaja_Det = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$acd->__GET('idArqueoCaja'), 
					$acd->__GET('idMoneda'), 
					$acd->__GET('idDenominacion'),
					$acd->__GET('cantidad'),
					$acd->__GET('subtotal'),
					$acd->__GET('id_ArqueoCaja_Det')
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

	public function deleteACD($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_arqueocaja_det SET
						estado = 3
				    WHERE id_ArqueoCaja_Det = ?";

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
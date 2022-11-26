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

	/* public function insertarUsuario(tbl_usuario $user){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_usuario (usuario, pwd, nombres, apellidos, email, estado)
					VALUES(?,?,?,?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$user->__GET('usuario'),
				$user->__GET('pwd'),
				$user->__GET('nombres'),
				$user->__GET('apellidos'),
				$user->__GET('email'),
				$user->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	} */

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
<?php
include_once("conexion.php");
include_once("./entidades/tasacambio_det.php");


class Dt_tasacambio_det extends Conexion
{
    private $myCon;

    public function listarTasacambioDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tasacambio_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$tcd = new Tasacambio_det();

				//_SET(CAMPOBD, atributoEntidad)			
				$tcd->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
				$tcd->__SET('id_tasaCambio', $r->id_tasaCambio);
				$tcd->__SET('fecha', $r->fecha);
                $tcd->__SET('tipoCambio', $r->tipoCambio);
				$result[] = $tcd;
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
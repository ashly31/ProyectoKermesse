<?php
include_once("conexion.php");
include_once("./entidades/tbl_ingreso_comunidad_det.php");


class Dt_ingresoComunidad_det extends Conexion
{
    private $myCon;

    public function listarIngresoComunidad_det(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_ingreso_comunidad_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$icd = new Tbl_ingreso_comunidad_det();

				//_SET(CAMPOBD, atributoEntidad)			
				$icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
				$icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
				$icd->__SET('id_bono', $r->id_bono);
				$icd->__SET('denominacion', $r->denominacion);
				$icd->__SET('cantidad', $r->cantidad);
				$icd->__SET('subtotal_bono', $r->subtotal_bono);
				$result[] = $icd;
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
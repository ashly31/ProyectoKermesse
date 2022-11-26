<?php
include_once("conexion.php");
include_once("./entidades/tbl_moneda.php");


class Dt_Moneda extends Conexion
{
    private $myCon;

    public function listarMoneda(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_moneda;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$m = new Tbl_moneda();

				//_SET(CAMPOBD, atributoEntidad)			
				$m->__SET('id_moneda', $r->id_moneda);
				$m->__SET('nombre', $r->nombre);
				$m->__SET('simbolo', $r->simbolo);
				$m->__SET('estado', $r->estado);
				$result[] = $m;
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
<?php
include_once("conexion.php");
include_once("./entidades/tbl_tasacambio.php");


class Dt_Tasacambio extends Conexion
{
    private $myCon;

    public function listarTasacambio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_tasacambio;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$tc = new tbl_tasacambio();

				//_SET(CAMPOBD, atributoEntidad)			
				$tc->__SET('id_tasaCambio', $r->id_tasaCambio);
				$tc->__SET('id_monedaO', $r->id_monedaO);
				$tc->__SET('id_monedaC', $r->id_monedaC);
                $tc->__SET('mes', $r->mes);
				$tc->__SET('anio', $r->anio);
				$tc->__SET('estado', $r->estado);
				$result[] = $tc;
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
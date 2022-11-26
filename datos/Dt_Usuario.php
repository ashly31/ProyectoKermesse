<?php
include_once("conexion.php");
include_once("./entidades/tbl_usuario.php");


class Dt_usuario extends Conexion
{
    private $myCon;

    public function listarIngresoUsuario(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$user = new tbl_usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$user->__SET('id_usuario', $r->id_usuario);
				$user->__SET('usuario', $r->usuario);
				$user->__SET('pwd', $r->pwd);
				$user->__SET('nombres', $r->nombres);
				$user->__SET('apellidos', $r->apellidos);
				$user->__SET('email', $r->email);
				$user->__SET('estado', $r->estado);
				$result[] = $user;
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
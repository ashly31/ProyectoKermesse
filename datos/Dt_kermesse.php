<?php
include_once("conexion.php");
include_once("./entidades/tbl_Kermesse.php");


class Dt_kermesse extends Conexion
{
    private $myCon;

    public function listarKermesse(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_kermesse;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$k = new Tbl_kermesse();

				//_SET(CAMPOBD, atributoEntidad)			
				$k->__SET('id_kermesse', $r->id_kermesse);
				$k->__SET('idParroquia', $r->idParroquia);
				$k->__SET('nombre', $r->nombre);
				$k->__SET('fInicio', $r->fInicio);
				$k->__SET('fFinal', $r->fFinal);
				$k->__SET('descripcion', $r->descripcion);
				$k->__SET('estado', $r->estado);
				$k->__SET('usuario_creacion', $r->usuario_creacion);
				$k->__SET('fecha_creacion', $r->fecha_creacion);
				$k->__SET('usuario_modificacion', $r->usuario_modificacion);
				$k->__SET('fecha_modificacion', $r->fecha_modificacion);
				$k->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$k->__SET('fecha_eliminacion', $r->fecha_eliminacion);
				$result[] = $k;
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
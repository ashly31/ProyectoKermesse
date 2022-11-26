<?php
include_once("conexion.php");
include_once("./entidades/tbl_arqueocaja.php");


class Dt_arqueoCaja extends Conexion
{
    private $myCon;

    public function listarArqueocaja(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_arqueocaja;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$ac = new Tbl_arqueocaja();

				//_SET(CAMPOBD, atributoEntidad)			
				$ac->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
				$ac->__SET('idKermesse', $r->idKermesse);
				$ac->__SET('fechaArqueo', $r->fechaArqueo);
				$ac->__SET('granTotal', $r->granTotal);
				$ac->__SET('usuario_creacion', $r->usuario_creacion);
				$ac->__SET('fecha_creacion', $r->fecha_creacion);
				$ac->__SET('usuario_modificacion', $r->usuario_modificacion);
				$ac->__SET('fecha_modificacion', $r->fecha_modificacion);
				$ac->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$ac->__SET('fecha_eliminacion', $r->fecha_eliminacion);
				$ac->__SET('estado', $r->estado);
				$result[] = $ac;
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
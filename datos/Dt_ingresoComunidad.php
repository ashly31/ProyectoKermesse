<?php
include_once("conexion.php");
include_once("./entidades/tbl_ingreso_comunidad.php");


class Dt_ingresoComunidad extends Conexion
{
    private $myCon;

    public function listarIngresoComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_ingreso_comunidad;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$ic = new Tbl_ingreso_comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
				$ic->__SET('id_kermesse', $r->id_kermesse);
				$ic->__SET('id_comunidad', $r->id_comunidad);
				$ic->__SET('id_producto', $r->id_producto);
				$ic->__SET('cant_productos', $r->cant_productos);
				$ic->__SET('total_bonos', $r->total_bonos);
				$ic->__SET('estado', $r->estado);
				$ic->__SET('usuario_creacion', $r->usuario_creacion);
				$ic->__SET('fecha_creacion', $r->fecha_creacion);
				$ic->__SET('usuario_modificacion', $r->usuario_modificacion);
				$ic->__SET('fecha_modificacion', $r->fecha_modificacion);
				$ic->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);
				$result[] = $ic;
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
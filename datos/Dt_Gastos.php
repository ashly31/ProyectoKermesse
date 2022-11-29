<?php
include_once("conexion.php");
include_once("../entidades/tbl_gastos.php");


class Dt_Gastos extends Conexion
{
    private $myCon;

    public function listarGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_gastos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$g = new Tbl_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$g->__SET('id_registro_gastos', $r->id_registro_gastos);
				$g->__SET('idKermesse', $r->idKermesse);
				$g->__SET('idCatGastos', $r->idCatGastos);
				$g->__SET('fechaGasto', $r->fechaGasto);
				$g->__SET('concepto', $r->concepto);
				$g->__SET('monto', $r->monto);
				$g->__SET('usuario_creacion', $r->usuario_creacion);
				$g->__SET('fecha_creacion', $r->fecha_creacion);
				$g->__SET('usuario_modificacion', $r->usuario_modificacion);
				$g->__SET('fecha_modificacion', $r->fecha_modificacion);
				$g->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$g->__SET('fecha_eliminacion', $r->fecha_eliminacion);
				$g->__SET('estado', $r->estado);
				$result[] = $g;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

    public function getGastosByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_gastos WHERE id_registro_gastos = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $g = new Tbl_Usuario();
            //_SET(CAMPOBD, atributoEntidad)
            $g->__SET('id_registro_gastos', $r->id_registro_gastos);
            $g->__SET('idKermesse', $r->idKermesse);
            $g->__SET('idCatGastos', $r->idCatGastos);
            $g->__SET('fechaGasto', $r->fechaGasto);
            $g->__SET('concepto', $r->concepto);
            $g->__SET('monto', $r->monto);
            $g->__SET('usuario_creacion', $r->usuario_creacion);
            $g->__SET('fecha_creacion', $r->fecha_creacion);
            $g->__SET('usuario_modificacion', $r->usuario_modificacion);
            $g->__SET('fecha_modificacion', $r->fecha_modificacion);
            $g->__SET('usuario_eliminacion', $r->usuario_eliminacion);
            $g->__SET('fecha_eliminacion', $r->fecha_eliminacion);
            $this->myCon = parent::desconectar();
            return $g;
        }
        catch (Exception $e)
        {
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
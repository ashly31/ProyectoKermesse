<?php
include_once("conexion.php");
include_once("./entidades/tbl_productos.php");


class Dt_Productos extends Conexion
{
    private $myCon;

    public function listarProductos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_productos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$p = new Tbl_productos();

				//_SET(CAMPOBD, atributoEntidad)			
				$p->__SET('id_producto', $r->id_producto);
				$p->__SET('id_comunidad', $r->id_comunidad);
				$p->__SET('id_cat_producto', $r->id_cat_producto);
				$p->__SET('nombre', $r->nombre);
				$p->__SET('descripcion', $r->descripcion);
				$p->__SET('cantidad', $r->cantidad);
				$p->__SET('preciov_sugerido', $r->preciov_sugerido);
				$p->__SET('estado', $r->estado);
				$result[] = $p;
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
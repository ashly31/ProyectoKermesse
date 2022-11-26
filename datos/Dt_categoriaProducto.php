<?php
include_once("conexion.php");
include_once("./entidades/tbl_categoria_producto.php");


class Dt_categoriaProducto extends Conexion
{
    private $myCon;

    public function listarCategoriaProducto(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_producto;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cp = new Tbl_categoria_producto();

				//_SET(CAMPOBD, atributoEntidad)			
				$cp->__SET('id_categoria_producto', $r->id_categoria_producto);
				$cp->__SET('nombre', $r->nombre);
				$cp->__SET('descripcion', $r->descripcion);
				$cp->__SET('estado', $r->estado);
				$result[] = $cp;
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
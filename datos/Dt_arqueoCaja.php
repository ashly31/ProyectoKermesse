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

	public function insertAC(Tbl_arqueocaja $ac)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_arqueocaja (id_ArqueoCaja, idKermesse, fechaArqueo, granTotal, 
			usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, 
			fecha_eliminacion, estado) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $ac->__GET('id_ArqueoCaja'),
			 $ac->__GET('idKermesse'),
			 $ac->__GET('fechaArqueo'),
			 $ac->__GET('granTotal'),
			 $ac->__GET('usuario_creacion'),
			 $ac->__GET('fecha_creacion'),
			 $ac->__GET('usuario_modificacion'),
			 $ac->__GET('fecha_modificacion'),
			 $ac->__GET('usuario_eliminacion'),
			 $ac->__GET('fecha_eliminacion'),
			 $ac->__GET('estado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function getACByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja WHERE id_ArqueoCaja = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

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

			$this->myCon = parent::desconectar();
			return $ac;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editAC(Tbl_arqueocaja $ac)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_arqueocaja SET
						idKermesse = ?, 
						fechaArqueo = ?, 
						granTotal = ?,
						usuario_creacion = ?,
						fecha_creacion = ?,
						usuario_modificacion = ?,
						fecha_modificacion = ?,
						usuario_eliminacion = ?,
						fecha_eliminacion = ?, 
						estado = ?
				    WHERE id_ArqueoCaja = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$ac->__GET('idKermesse'), 
					$ac->__GET('fechaArqueo'), 
					$ac->__GET('granTotal'),
					$ac->__GET('usuario_creacion'),
					$ac->__GET('fecha_creacion'),
					$ac->__GET('usuario_modificacion'),
					$ac->__GET('fecha_modificacion'),
					$ac->__GET('usuario_eliminacion'),
					$ac->__GET('fecha_eliminacion'),
					$ac->__GET('estado'),
					$ac->__GET('id_ArqueoCaja')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteAC($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_arqueocaja SET
						estado = 3
				    WHERE id_ArqueoCaja = ?";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

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
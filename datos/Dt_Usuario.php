<?php
include_once("conexion.php");
include_once("../entidades/tbl_usuario.php");


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

	public function insertarUsuario(tbl_usuario $user){
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
	}

    public function getUserByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE id_usuario = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $u = new tbl_usuario();

            //_SET(CAMPOBD, atributoEntidad)
            $u->__SET('id_usuario', $r->id_usuario);
            $u->__SET('usuario', $r->usuario);
            $u->__SET('nombres', $r->nombres);
            $u->__SET('apellidos', $r->apellidos);
            $u->__SET('email', $r->email);

            $this->myCon = parent::desconectar();
            return $u;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editUser(tbl_usuario $tu)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
						pwd = ?,
						nombres = ?, 
						apellidos = ?, 
						email = ?, 
						estado = ?
				    WHERE id_usuario = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        //$tu->__GET('usuario'),
                        $tu->__GET('pwd'),
                        $tu->__GET('nombres'),
                        $tu->__GET('apellidos'),
                        $tu->__GET('email'),
                        $tu->__GET('estado'),
                        $tu->__GET('id_usuario')
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

    public function deleteUser($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
						estado = 3
				    WHERE id_usuario = ?";

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

    public function validarUser($user, $pwd)
    {
        try
        {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE usuario=? AND pwd=? AND estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($user, $pwd));

            $resultado = $stm->fetchAll(PDO::FETCH_CLASS, "tbl_usuario");

            $this->myCon = parent::desconectar();
            return $resultado;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


	}

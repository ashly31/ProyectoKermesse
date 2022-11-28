<?php
include_once("conexion.php");

class Dt_Productos extends Conexion
{
    private $myCon;

    public function listarProductos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_productos WHERE estado <>3;";

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

	 public function insertProd(tbl_productos $prod){
		try{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_productos (id_comunidad, id_cat_producto, nombre, descripcion, cantidad, preciov_sugerido, estado)
					VALUES(?,?,?,?,?,?,?)";
			
			$this->myCon->prepare($sql)->execute(array(
				$prod->__GET('id_comunidad'),
				$prod->__GET('id_cat_producto'),
				$prod->__GET('nombre'),
				$prod->__GET('descripcion'),
				$prod->__GET('cantidad'),
				$prod->__GET('preciov_sugerido'),
                $prod->__GET('estado')));
			
			$this->myCon = parent::desconectar();

		}catch (Exception $e){
			die($e->getMessage());
		}
	}

    public function getProdByID($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_productos WHERE id_producto= ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $prod = new Tbl_productos();

            //_SET(CAMPOBD, atributoEntidad)
            $prod->__SET('id_producto', $r->id_producto);
            $prod->__SET('id_comunidad', $r->id_comunidad);
            $prod->__SET('id_cat_producto', $r->id_cat_producto);
            $prod->__SET('nombre', $r->nombre);
            $prod->__SET('descripcion', $r->descripcion);
            $prod->__SET('cantidad', $r->cantidad);
            $prod->__SET('preciov_sugerido', $r->preciov_sugerido);

            $this->myCon = parent::desconectar();
            return $prod;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function editProd(tbl_productos $prod)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_productos SET
						id_comunidad= ?,
						id_cat_producto = ?,
						nombre = ?,
						descripcion = ?,
						cantidad = ?,
						preciov_sugerido = ?,
						estado = ?,
				    WHERE id_producto = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $prod->__GET('id_comunidad'),
                        $prod->__GET('id_cat_producto'),
                        $prod->__GET('nombre'),
                        $prod->__GET('descripcion'),
                        $prod->__GET('cantidad'),
                        $prod->__GET('preciov_sugerido'),
                        $prod->__GET('estado'),
                        $prod->__GET('id_producto')
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

    public function deleteProd($id)
    {
        try
        {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_productos SET
						estado = 3
				    WHERE id_producto = ?";

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

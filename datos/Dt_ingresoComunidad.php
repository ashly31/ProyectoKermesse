<?php
include_once("conexion.php");


class Dt_ingresoComunidad extends Conexion
{
    private $myCon;

    public function listarIngresoComunidad()
    {

        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.tbl_ingreso_comunidad;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertIngresoC(tbl_ingreso_comunidad $ic)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad (id_kermesse, id_comunidad, id_producto, cant_productos, total_bonos, estado, usuario_creacion, fecha_creacion)
					VALUES(?,?,?,?,?,?,?,?)";

            $this->myCon->prepare($sql)->execute(array(
                $ic->__GET('id_kermesse'),
                $ic->__GET('id_comunidad'),
                $ic->__GET('id_producto'),
                $ic->__GET('cant_productos'),
                $ic->__GET('total_bonos'),
                $ic->__GET('estado'),
                $ic->__GET('usuario_creacion'),
                $ic->__GET('fecha_creacion')));

            $this->myCon = parent::desconectar();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getIngresoCByID($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad WHERE id_ingreso_comunidad = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

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

            $this->myCon = parent::desconectar();
            return $ic;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editIngresoC(tbl_ingreso_comunidad $tic)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_ingreso_comunidad SET
						id_kermesse = ?,
						id_comunidad = ?, 
						id_producto = ?, 
						cant_productos = ?,
						total_bonos = ?,
						estado = 2,
						usuario_modificacion = ?,
						fecha_modificacion = ?
				    WHERE id_ingreso_comunidad = ?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        //$tu->__GET('usuario'),
                        $tic->__GET('id_kermesse'),
                        $tic->__GET('id_comunidad'),
                        $tic->__GET('id_producto'),
                        $tic->__GET('cant_productos'),
                        $tic->__GET('total_bonos'),
                        $tic->__GET('usuario_modificacion'),
                        $tic->__GET('fecha_modificacion'),
                        $tic->__GET('id_ingreso_comunidad')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteIngresoC($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_ingreso_comunidad SET
						estado = 3
				    WHERE id_ingreso_comunidad = ?";

            $stm = $this->myCon->prepare($sql);
            $stm->execute(array($id));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }
}

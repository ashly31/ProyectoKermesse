<?php

include_once("conexion.php");

    class Dt_Vw_ACD extends Conexion
    {

        private $myCon;

        public function listarArqueoD($id){

            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vw_ACD where idArqueoCaja_Det = ?";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){

                    $vacd = new vxACD();

                    $vacd->__SET('idArqueoCaja_Det',$r->idArqueoCaja_Det);
                    $vacd->__SET('id_ArqueoCaja',$r->id_ArqueoCaja);
                    $vacd->__SET('idMoneda',$r->idMoneda);
                    $vacd->__SET('idDenominacion',$r->idDenominacion);
                    $vacd->__SET('cantidad',$r->cantidad);
                    $vacd->__SET('subtotal',$r->subtotal);

                    $result[]=$vacd;
                }

                $this->myCon = parent::desconectar();
                return $result;

            } catch(Exception $e) {

                die($e->getMessage());
                
            }

        }

    }

?>
<?php

include_once("../entidades/tasacambio_det.php");
include_once("../datos/Dt_tasacambio_det.php");

$tcd = new Tasacambio_det();
$dtcd = new Dt_tasacambio_det();

if ($_POST) 
{
    $varAccion = $_POST['txtaccion']; 

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcd->__SET('id_tasaCambio_det', $_POST['id_tasaCambio_det']);
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio']);
				$tcd->__SET('fecha',$_POST['fecha']);
                $tcd->__SET('tipoCambio',$_POST['tipoCambio']);
				$result[] = $tcd;

                $dtcd->insertarTasaCambioDet($tcd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=2");
            }
            break;
        
        case '2':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcd->__SET('id_tasaCambio_det', $_POST['id_tasaCambio_det']);
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio']);
                $tcd->__SET('fecha', $_POST['fecha']);
                $tcd->__SET('tipoCambio', $_POST['tipoCambio']);

                $dtcd->editarTasaCambioDet($tcd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}


if ($_GET) 
{
    try 
    {
        
        $tcd->__SET('id_tasaCambio_det', $_GET['delTCD']);
        $dtcd->eliminarTasaCambioDet($tcd->__GET('id_tasaCambio_det'));
        header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_tasacambio_det.php?msj=6");
        die($e->getMessage());
    }
}


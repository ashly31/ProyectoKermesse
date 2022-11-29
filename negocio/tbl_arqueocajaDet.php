<?php

include_once("../entidades/tbl_arqueocaja_det.php");
include_once("../datos/Dt_arqueoCaja_det.php");

$acd = new tbl_arqueocaja_det();
$dacd = new Dt_arqueoCaja_det();

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
                $acd->__SET('idArqueoCaja', $_POST['idArqueoCaja']);
                $acd->__SET('idMoneda', $_POST['idMoneda']);
                $acd->__SET('idDenominacion', $_POST['idDenominacion']);
                $acd->__SET('cantidad', $_POST['cantidad']);
                $acd->__SET('subtotal', $_POST['subtotal']);

                $dacd->insertACD($acd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /ProyectoKermesse/arqueocajaDet/editar_arqueocajaDet.php?msj=5&varEnter={$_POST['idArqueoCaja_Det']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $acd->__SET('idArqueoCaja_Det', $_POST['idArqueoCaja_Det']);
                $acd->__SET('idArqueoCaja', $_POST['idArqueoCaja']);
                $acd->__SET('idMoneda', $_POST['idMoneda']);
                $acd->__SET('idDenominacion', $_POST['idDenominacion']);
                $acd->__SET('cantidad', $_POST['cantidad']);
                $acd->__SET('subtotal', $_POST['subtotal']);
                
                $dacd->editACD($acd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}


if ($_GET) 
{
    try 
    {
        
        $acd->__SET('idArqueoCaja_Det', $_GET['delACD']);
        $dacd->deleteACD($acd->__GET('idArqueoCaja_Det'));
        header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_arqueoCaja_det.php?msj=6");
        die($e->getMessage());
    }
}

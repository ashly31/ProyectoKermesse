<?php

include_once("../entidades/tbl_ingreso_comunidad_det.php");
include_once("../datos/Dt_ingresoComunidad_det.php");

$ticd = new tbl_ingreso_comunidad_det();
$dticd = new Dt_ingresoComunidad_det();

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
                $ticd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                $ticd->__SET('id_bono', $_POST['id_bono']);
                $ticd->__SET('denominacion', $_POST['denominacion']);
                $ticd->__SET('cantidad', $_POST['cantidad']);
                $ticd->__SET('subtotal_bono', $_POST['subtotal_bono']);


                $dticd->insertIngresoCD($ticd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_ingresoComunidad_det.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_ingresoComunidad_det.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROLid_ingreso_comunidad
                $ticd->__SET('id_ingreso_comunidad_det', $_POST['id_ingreso_comunidad_det']);
                $ticd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                $ticd->__SET('id_bono', $_POST['id_bono']);
                $ticd->__SET('denominacion', $_POST['denominacion']);
                $ticd->__SET('cantidad', $_POST['cantidad']);
                $ticd->__SET('subtotal_bono', $_POST['subtotal_bono']);

                $dticd->editIngresoCD($ticd);

                header("Location: /ProyectoKermesse/tbl_ingresoComunidad_det.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_ingresoComunidad_det.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $ticd->__SET('id_ingreso_comunidad_det', $_GET['delICD']);
        $dticd->deleteIngresoCD($ticd->__GET('id_ingreso_comunidad_det'));
        header("Location: /ProyectoKermesse/tbl_ingresoComunidad_det.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_ingresoComunidad_det.php?msj=6");
        die($e->getMessage());
    }
}

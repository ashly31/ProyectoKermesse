<?php

include_once("../entidades/tbl_denominacion.php");
include_once("../datos/Dt_Denominacion.php");

$tbd = new tbl_denominacion();
$dtd = new Dt_Denominacion();

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
                //$tbd->__SET('id_Denominacion', $_POST['id_Denominacion']);
                $tbd->__SET('idMoneda', $_POST['idMoneda']);
                $tbd->__SET('valor', $_POST['valor']);
                $tbd->__SET('valor_letras', $_POST['valor_letras']);
                $tbd->__SET('estado', 1);


                $dtd->insertDeno($tbd);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Denominacion.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Denominacion.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL

                $tbd->__SET('id_Denominacion', $_POST['id_Denominacion']);
                $tbd->__SET('idMoneda', $_POST['idMoneda']);
                $tbd->__SET('valor', $_POST['valor']);
                $tbd->__SET('valor_letras', $_POST['valor_letras']);
                $tbd->__SET('estado', 2);

                $dtd->editDeno($tbd);

                header("Location: /ProyectoKermesse/tbl_Denominacion.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /ProyectoKermesse/tbl_Denominacion.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbd->__SET('id_Denominacion', $_GET['delD']);
        $dtd->deleteDeno($tbd->__GET('id_Denominacion'));
        header("Location: /ProyectoKermesse/tbl_denominacion.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_denominacion.php?msj=6");
        die($e->getMessage());
    }
}

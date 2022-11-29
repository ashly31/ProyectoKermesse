<?php

include_once("../entidades/tbl_tasacambio.php");
include_once("../datos/Dt_Tasacambio.php");

$tbu = new tbl_tasacambio();
$dtu = new Dt_Tasacambio();

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
                $tbu->__SET('id_monedaO', $_POST['id_monedaO']);
                $tbu->__SET('id_monedaC', $_POST['id_monedaC']);
                $tbu->__SET('mes', $_POST['mes']);
                $tbu->__SET('anio', $_POST['anio']);
                $tbu->__SET('estado', 1);

                $dtu->insertTc($tbu);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Tasacambio.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Tasacambio.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {

                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tbu->__SET('id_tasaCambio', $_POST['id_tasaCambio']);
                $tbu->__SET('id_monedaO', $_POST['id_monedaO']);
                $tbu->__SET('id_monedaC', $_POST['id_monedaC']);
                $tbu->__SET('mes', $_POST['mes']);
                $tbu->__SET('anio', $_POST['anio']);
                $tbu->__SET('estado', 2);

                $dtu->editTc($tbu);

                header("Location: /ProyectoKermesse/tbl_Tasacambio.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_Tasacambio.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbu->__SET('id_tasaCambio', $_GET['delTc']);
        $dtu->deleteTc($tbu->__GET('id_tasaCambio'));
        header("Location: /ProyectoKermesse/tbl_Tasacambio.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Tasacambio.php?msj=6");
        die($e->getMessage());
    }
}

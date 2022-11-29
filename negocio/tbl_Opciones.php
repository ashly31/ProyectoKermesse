<?php

include_once("../entidades/tbl_opciones.php");
include_once("../datos/Dt_Opciones.php");

$tbr= new Tbl_opciones();
$dtr = new Dt_Opciones();

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
                $tbr->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $tbr->__SET('estado', 1);


                $dtr->insertOpcion($tbr);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Opciones.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Opciones.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tbr->__SET('id_opciones', $_POST['id_opciones']);
                $tbr->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                $tbr->__SET('estado', 2);

                $dtr->editOpcion($tbr);

                header("Location: /ProyectoKermesse/tbl_Opciones.php?msj=3");

            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_Opciones.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbr->__SET('id_opciones', $_GET['delOp']);
        $dtr->deleteOp($tbr->__GET('id_opciones'));
        header("Location: /ProyectoKermesse/tbl_Opciones.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Opciones.php?msj=6");
        die($e->getMessage());
    }
}

<?php

include_once("../entidades/tbl_Kermesse.php");
include_once("../datos/Dt_kermesse.php");

$tbk = new tbl_kermesse();
$dtk = new Dt_kermesse();

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
                $tbk->__SET('idParroquia', $_POST['idParroquia']);
                $tbk->__SET('nombre', $_POST['nombre']);
                $tbk->__SET('fInicio', $_POST['fInicio']);
                $tbk->__SET('fFinal', $_POST['fFinal']);
                $tbk->__SET('descripcion', $_POST['descripcion']);
                $tbk->__SET('estado', 1);
                $tbk->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tbk->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tbk->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $tbk->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $tbk->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $tbk->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']);


                $dtk->insertKermesse($tbk);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_kermesse.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_kermesse.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL

                $tbk->__SET('idParroquia', $_POST['idParroquia']);
                $tbk->__SET('nombre', $_POST['nombre']);
                $tbk->__SET('fInicio', $_POST['fInicio']);
                $tbk->__SET('fFinal', $_POST['fFinal']);
                $tbk->__SET('descripcion', $_POST['descripcion']);
                $tbk->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tbk->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tbk->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $tbk->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $tbk->__SET('estado', 2);

                $dtk->editKermesse($tbk);

                header("Location: /ProyectoKermesse/tbl_kermesse.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_kermesse.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbk->__SET('id_kermesse', $_GET['delK']);
        $dtk->deleteKermesse($tbk->__GET('id_kermesse'));
        header("Location: /ProyectoKermesse/tbl_kermesse.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_kermesse.php?msj=6");
        die($e->getMessage());
    }
}

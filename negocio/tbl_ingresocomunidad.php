<?php

include_once("../entidades/tbl_ingreso_comunidad.php");
include_once("../datos/Dt_ingresoComunidad.php");

$tic = new tbl_ingreso_comunidad();
$dtic = new Dt_ingresoComunidad();

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
                $tic->__SET('id_kermesse', $_POST['id_kermesse']);
                $tic->__SET('id_comunidad', $_POST['id_comunidad']);
                $tic->__SET('id_producto', $_POST['id_producto']);
                $tic->__SET('cant_productos', $_POST['cant_productos']);
                $tic->__SET('total_bonos', $_POST['total_bonos']);
                $tic->__SET('estado', 1);
                $tic->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tic->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tic->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $tic->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $tic->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $tic->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']);


                $dtic->insertIngresoC($tic);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_ingresoComunidad.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_ingresoComunidad.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL

                $tic->__SET('id_kermesse', $_POST['id_kermesse']);
                $tic->__SET('id_comunidad', $_POST['id_comunidad']);
                $tic->__SET('id_producto', $_POST['id_producto']);
                $tic->__SET('cant_productos', $_POST['fFinal']);
                $tic->__SET('total_bonos', $_POST['total_bonos']);
                $tic->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tic->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tic->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $tic->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $tic->__SET('estado', 2);

                $dtic->editIngresoC($tic);

                header("Location: /ProyectoKermesse/tbl_ingresoComunidad.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_ingresoComunidad.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tic->__SET('id_kermesse', $_GET['delIC']);
        $dtic->deleteIngresoC($tic->__GET('id_ingreso_comunidad'));
        header("Location: /ProyectoKermesse/tbl_ingresoComunidad.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_ingresoComunidad.php?msj=6");
        die($e->getMessage());
    }
}

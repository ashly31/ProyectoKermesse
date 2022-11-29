<?php

include_once("../entidades/tbl_gastos.php");
include_once("../datos/Dt_Gastos.php");

$tbg = new tbl_gastos();
$dtg = new Dt_Gastos();

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
                $tbg->__SET('idKermesse', $_POST['idKermesse']);
                $tbg->__SET('idCatGastos', $_POST['idCatGastos']);
                $tbg->__SET('fechaGasto', $_POST['fechaGasto']);
                $tbg->__SET('concepto', $_POST['concepto']);
                $tbg->__SET('monto', $_POST['monto']);
                $tbg->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tbg->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tbg->__SET('estado', 1);


                $dtg->insertGastos($tbg);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL

                $tbg->__SET('idKermesse', $_POST['idKermesse']);
                $tbg->__SET('idCatGastos', $_POST['idCatGastos']);
                $tbg->__SET('fechaGasto', $_POST['fechaGasto']);
                $tbg->__SET('concepto', $_POST['concepto']);
                $tbg->__SET('monto', $_POST['monto']);
                $tbg->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $tbg->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $tbg->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $tbg->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $tbg->__SET('estado', 2);

                $dtg->editGastos($tbg);

                header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbg->__SET('id_registro_gastos', $_GET['delG']);
        $dtg->deleteGastos($tbg->__GET('id_registro_gastos'));
        header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Gastos.php?msj=6");
        die($e->getMessage());
    }
}

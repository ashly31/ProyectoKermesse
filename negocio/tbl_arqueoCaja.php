<?php

include_once("../entidades/tbl_arqueocaja.php");
include_once("../datos/Dt_arqueoCaja.php");

$ac = new tbl_arqueocaja();
$dac = new Dt_arqueoCaja();

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
                $ac->__SET('idKermesse', $_POST['idKermesse']);
                $ac->__SET('fechaArqueo', $_POST['fechaArqueo']);
                $ac->__SET('granTotal', $_POST['granTotal']);
                $ac->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $ac->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $ac->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $ac->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $ac->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $ac->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']);
                $ac->__SET('estado', 1);

                $dac->insertAC($ac);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {

                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $ac->__SET('id_ArqueoCaja', $_POST['idAC']);
                $ac->__SET('idKermesse', $_POST['idKermesse']);
                $ac->__SET('fechaArqueo', $_POST['fechaArqueo']);
                $ac->__SET('granTotal', $_POST['granTotal']);
                $ac->__SET('usuario_creacion', $_POST['usuario_creacion']);
                $ac->__SET('fecha_creacion', $_POST['fecha_creacion']);
                $ac->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $ac->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $ac->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $ac->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']);
                $ac->__SET('estado', 2);
        
                $dac->editAC($ac);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}


if ($_GET) 
{
    try 
    {
        
        $ac->__SET('id_ArqueoCaja', $_GET['delAC']);
        $dac->deleteAC($ac->__GET('id_ArqueoCaja'));
        header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_arqueoCaja.php?msj=6");
        die($e->getMessage());
    }
} 

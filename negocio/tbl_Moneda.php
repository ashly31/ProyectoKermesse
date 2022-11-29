<?php

include_once("../entidades/tbl_moneda.php");
include_once("../datos/Dt_Moneda.php");

$mon = new tbl_moneda();
$dmon = new Dt_Moneda();

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
                $mon->__SET('nombre', $_POST['nombre']);              
                $mon->__SET('simbolo', $_POST['simbolo']);              
                $mon->__SET('estado', 1);

                $dmon->insertarMoneda($mon);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {   
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $mon->__SET('id_moneda', $_POST['idmon']);
                $mon->__SET('nombre', $_POST['nombre']);
                $mon->__SET('simbolo', $_POST['simbolo']);
                $mon->__SET('estado', 2);

                
        
                $dmon->editMoneda($mon);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }
}

if ($_GET)
{
    try
    {

        $mon->__SET('id_moneda', $_GET['delMon']);
        $dmon->deleteMoneda($mon->__GET('id_moneda'));
        header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Moneda.php?msj=6");
        die($e->getMessage());
    }
}
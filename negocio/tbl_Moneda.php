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
                header("Location: /Kermesse/tbl_Moneda.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Moneda.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /Kermesse/moneda/editar_moneda.php?msj=5&varEnter={$_POST['idMon']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $op->__SET('id_moneda', $_POST['idmon']);
                $op->__SET('nombre', $_POST['nombre']);
                $op->__SET('simbolo', $_POST['simbolo']);
                
                
                
        
                $dmon->editMoneda($mon);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_Moneda.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Moneda.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}
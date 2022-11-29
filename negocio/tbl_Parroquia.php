<?php

include_once("../entidades/tbl_parroquia.php");
include_once("../datos/Dt_Parroquia.php");

$pq = new Tbl_parroquia();
$dpq = new Dt_Parroquia();

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
                $pq->__SET('nombre', $_POST['nombre']);              
                $pq->__SET('direccion', $_POST['direccion']);              
                $pq->__SET('telefono', $_POST['telefono']);              
                $pq->__SET('parroco', $_POST['logo']);              
                $pq->__SET('sitio_web', $_POST['sitio_web']);

                $dpq->insertarParroquia($pq);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $pq->__SET('idParroquia', $_POST['idParroquia']);
                $pq->__SET('nombre', $_POST['nombre']);              
                $pq->__SET('direccion', $_POST['direccion']);              
                $pq->__SET('telefono', $_POST['telefono']);              
                $pq->__SET('parroco', $_POST['logo']);              
                $pq->__SET('sitio_web', $_POST['sitio_web']);
        
                $dpq->editParroquia($pq);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }
}

if ($_GET)
{
    try
    {

        $pq->__SET('idParroquia', $_GET['delPq']);
        $dpq->deletePq($pq->__GET('idParroquia'));
        header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Parroquia.php?msj=6");
        die($e->getMessage());
    }
}
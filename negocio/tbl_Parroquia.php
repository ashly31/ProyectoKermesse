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
                $pq->__SET('estado', 1);

                $dpq->insertarParroquia($pq);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_Parroquia.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Parroquia.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /Kermesse/parroquia/editar_parroquia.php?msj=5&varEnter={$_POST['idPq']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $pq->__SET('idParroquia', $_POST['idpq']);
                $pq->__SET('nombre', $_POST['nombre']);              
                $pq->__SET('direccion', $_POST['direccion']);              
                $pq->__SET('telefono', $_POST['telefono']);              
                $pq->__SET('parroco', $_POST['logo']);              
                $pq->__SET('sitio_web', $_POST['sitio_web']); 
                
                
                
        
                $dpq->editParroquia($pq);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_Parroquia.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Parroquia.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}
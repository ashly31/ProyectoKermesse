<?php

include_once("../entidades/tbl_lista_precio.php");
include_once("../datos/Dt_listaPrecio.php");

$lp = new tbl_lista_precio();
$dlp = new Dt_listaPrecio();

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
                $lp->__SET('id_lista_precio', $_POST['id_lista_precio']);              
                $lp->__SET('id_kermesse', $_POST['id_kermesse']);              
                $lp->__SET('nombre', $_POST['nombre']);  
                $lp->__SET('descripcion', $_POST['descripcion']);            
                $lp->__SET('estado', 1);

                $dlp->insertLP($lp);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
    
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $lp->__SET('id_lista_precio', $_POST['id_lista_precio']);
                $lp->__SET('id_kermesse', $_POST['id_kermesse']);              
                $lp->__SET('nombre', $_POST['nombre']);              
                $lp->__SET('descripcion', $_POST['descripcion']);
                $lp->__SET('estado', 2);
                
                
        
                $dlp->editLP($lp);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }
}

if ($_GET)
{
    try
    {

        $lp->__SET('id_lista_precio', $_GET['delLp']);
        $dlp->deleteLP($lp->__GET('id_lista_precio'));
        header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_listaPrecio.php?msj=6");
        die($e->getMessage());
    }
}
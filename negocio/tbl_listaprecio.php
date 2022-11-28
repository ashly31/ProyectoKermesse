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
                $lp->__SET('id_kermesse', $_POST['id_kermesse']);              
                $lp->__SET('nombre', $_POST['nombre']);              
                $lp->__SET('descripcion', $_POST['descripcion']);              
                $lp->__SET('estado', 1);

                $dlp->insertarLP($lp);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_listaPrecio.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_listaPrecio.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /Kermesse/listaprecio/editar_listaprecio.php?msj=5&varEnter={$_POST['idLp']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $lp->__SET('id_lista_precio', $_POST['idLp']);
                $lp->__SET('id_kermesse', $_POST['id_kermesse']);              
                $lp->__SET('nombre', $_POST['nombre']);              
                $lp->__SET('descripcion', $_POST['descripcion']);
                
                
                
        
                $dlp->editLP($lp);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_listaPrecio.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_listaPrecio.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}
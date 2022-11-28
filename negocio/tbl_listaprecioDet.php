<?php

include_once("../entidades/tbl_listaprecio_det.php");
include_once("../datos/Dt_listaPrecioDet.php");

$lpd = new Tbl_listaprecio_det();
$dlpd = new Dt_listaPrecioDet();

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
                $lpd->__SET('id_lista_precio', $_POST['id_lista_precio']);              
                $lpd->__SET('id_producto', $_POST['id_producto']);              
                $lpd->__SET('precio_venta', $_POST['precio_venta']);              
                $lpd->__SET('estado', 1);

                $dlpd->insertarLPDet($lpd);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_listaPrecioDet.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_listaPrecioDet.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /Kermesse/listaprecio_det/editar_listaprecioDet.php?msj=5&varEnter={$_POST['idListPrecDet']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $lpd->__SET('id_listaprecio_det', $_POST['idListPrecDet']);
                $lpd->__SET('id_lista_precio', $_POST['id_lista_precio']);              
                $lpd->__SET('id_producto', $_POST['id_producto']);              
                $lpd->__SET('precio_venta', $_POST['precio_venta']); 
                
                
                
        
                $dlpd->editLPDet($lpd);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_listaPrecioDet.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_listaPrecioDet.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}
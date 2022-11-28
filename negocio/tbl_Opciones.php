<?php

include_once("../entidades/tbl_opciones.php");
include_once("../datos/Dt_Opciones.php");

$op = new Tbl_opciones();
$dop = new Dt_Opciones();

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
                $op->__SET('opcion_descripcion', $_POST['opcion_descripcion']);              
                $op->__SET('estado', 1);

                $dop->insertarOpciones($op);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_Opciones.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Opciones.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /Kermesse/opciones/editar_opciones.php?msj=5&varEnter={$_POST['idOp']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $op->__SET('id_opciones', $_POST['idOp']);
                $op->__SET('opcion_descripcion', $_POST['opcion_descripcion']);
                
                
                
        
                $dop->editOpciones($op);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_Opciones.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_Opciones.php?msj=4");
                die($e->getMessage());
            }
            break;
        
    }


}
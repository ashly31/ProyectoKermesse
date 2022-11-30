<?php

include_once("../entidades/rol_Usuario.php");
include_once("../datos/Dt_rolUsuario.php");

$tru = new rol_usuario();
$dru = new Dt_rolUsuario();

if($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion){
        case '1':
            try{
                 //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tru->__SET('id_rol_usuario', $_POST['id_rol_usuario']);
                $tru->__SET('tbl_usuario_id_usuario', $_POST['tbl_usuario_id_usuario']);
                $tru->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $result[] = $tru;
                $dru->insertarRU($tru);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=1");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=2");

            }
            break;
        case '2':
            try{
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROl
                $tru->__SET('id_rol_usuario', $_POST['id_rol_usuario']);
                $tru->__SET('tbl_usuario_id_usuario', $_POST['tbl_usuario_id_usuario']);
                $tru->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);

                $dru->editRU($tru);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=3");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=4");
                die($e->getMessage());
            }
    }
}

if ($_GET) 
{
    try 
    {
        
        $tru->__SET('id_rol_usuario', $_GET['delRU']);
        $dru->deleteRU($tru->__GET('id_rol_usuario'));
        header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_rolUsuario.php?msj=6");
        die($e->getMessage());
    }
}
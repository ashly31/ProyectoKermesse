<?php

include_once("../entidades/tbl_control_bonos.php");
include_once("../datos/Dt_controlBonos.php");

$tcb = new Tbl_control_bonos();
$dcb = new Dt_controlBonos();

if($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion){
        case '1':
            try{
                 //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcb->__SET('id_bono', $_POST['id_bono']);
                $tcb->__SET('nombre', $_POST['nombre']);
                $tcb->__SET('valor', $_POST['valor']);
                $tcb->__SET('estado', 1);

                $dcb->insertar_ControlBonos($tcb);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_controlBonos.php?msj=1");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_controlBonos.php?msj=2");

            }
            break;
        case '2':
            try{
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcb->__SET('id_bono', $_POST['id_bono']);
                $tcb->__SET('nombre', $_POST['nombre']);
                $tcb->__SET('valor', $_POST['valor']);
                $tcb->__SET('estado', 2);

                $dcb->editar_ControlBonos($tcb);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_controlBonos.php?msj=3");
            }
            catch(Exception $e){

            }
    }
}

if ($_GET) 
{
    try 
    {
        
        $tcb->__SET('id_bono', $_GET['delCB']);
        $dcb->eliminar_ControlBonos($tcb->__GET('id_bono'));
        header("Location: /ProyectoKermesse/tbl_controlBonos.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_controlBonos.php?msj=6");
        die($e->getMessage());
    }
}
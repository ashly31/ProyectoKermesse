<?php

include_once("../entidades/rol_opciones.php");
include_once("../datos/Dt_rolOpciones.php");

$tro = new rol_opciones();
$dro = new Dt_rolOpciones();

if($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion){
        case '1':
            try{
                 //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tru->__SET('id_rol_opciones', $_POST['id_rol_opciones']);
                $tro->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $tro->__SET('tbl_opciones_id_opciones', $_POST['tbl_opciones_id_opciones']);
                $result[] = $tro;
                $dro->insertar_rolOpciones($tro);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=1");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=2");

            }
            break;
        case '2':
            try{
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROl
                $tro->__SET('id_rol_opciones', $_POST['id_rol_opciones']);
                $tro->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $tro->__SET('tbl_opciones_id_opciones', $_POST['tbl_opciones_id_opciones']);

                $dro->editar_rolOpciones($tro);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=3");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=4");
                die($e->getMessage());
            }
    }
}

if ($_GET) 
{
    try 
    {
        
        $tro->__SET('id_rol_opciones', $_GET['delRO']);
        $dro->eliminar_rolOpciones($tro->__GET('id_rol_opciones'));
        header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_rolOpciones.php?msj=6");
        die($e->getMessage());
    }
}
<?php

include_once("../entidades/tbl_comunidad.php");
include_once("../datos/Dt_Comunidad.php");

$tc = new Tbl_comunidad();
$dtc = new Dt_Comunidad();

if($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion){
        case '1':
            try{
                 //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL

                $tc->__SET('id_comunidad', $_POST['id_comunidad']);
                $tc->__SET('nombre', $_POST['nombre']);
                $tc->__SET('responsable', $_POST['responsable']);
                $tc->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $tc->__SET('estado', 1);

                $dtc->insertar_Comunidad($tc);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Comunidad.php?msj=1");
            }
            catch(Exception $e){
                header("Location: /ProyectoKermesse/tbl_Comunidad.php?msj=2");

            }
            break;
        case '2':
            try{
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tc->__SET('nombre', $_POST['nombre']);
                $tc->__SET('responsable', $_POST['responsable']);
                $tc->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $tc->__SET('estado', 2);

                $dtc->editar_Comunidad($tc);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Comunidad.php?msj=3");
            }
            catch(Exception $e){

            }
    }
}

if ($_GET) 
{
    try 
    {
        
        $tc->__SET('id_comunidad', $_GET['delCom']);
        $dtc->eliminar_Comunidad($tc->__GET('id_comunidad'));
        header("Location: /ProyectoKermesse/tbl_Comunidad.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /ProyectoKermesse/tbl_Comunidad.php?msj=6");
        die($e->getMessage());
    }
}
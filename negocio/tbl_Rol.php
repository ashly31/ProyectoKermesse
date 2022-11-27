<?php

include_once("../entidades/tbl_rol.php");
include_once("../datos/Dt_Rol.php");

$tbr= new Tbl_rol();
$dtr = new Dt_Rol();

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
                $tbr->__SET('rol_descripcion', $_POST['rol_descripcion']);
                $tbr->__SET('estado', 1);


                $dtr->insertRol($tbr);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Rol.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Rol.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /ProyectoKermesse/rol/editar_rol.php?msj=5&varEnter={$_POST['idR']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tbr->__SET('id_rol', $_POST['idR']);
                $tbr->__SET('rol_descripcion', $_POST['rol_d']);

                $dtr->editRol($tbr);

                header("Location: /ProyectoKermesse/tbl_Rol.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_Rol.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbr->__SET('id_rol', $_GET['delRol']);
        $dtr->deleteRol($tbr->__GET('id_rol'));
        header("Location: /ProyectoKermesse/tbl_Rol.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Rol.php?msj=6");
        die($e->getMessage());
    }
}

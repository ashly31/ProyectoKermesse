<?php

include_once("../entidades/tbl_usuario.php");
include_once("../datos/Dt_Usuario.php");

$tbu = new tbl_usuario();
$dtu = new Dt_Usuario();

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
                $tbu->__SET('usuario', $_POST['usuario']);
                $tbu->__SET('pwd', $_POST['pwd']);
                $tbu->__SET('nombres', $_POST['nombres']);
                $tbu->__SET('apellidos', $_POST['apellidos']);
                $tbu->__SET('email', $_POST['email']);
                $tbu->__SET('estado', 1);

                $dtu->insertUser($tbu);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Usuario.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Usuario.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tbu->__SET('id_usuario', $_POST['idU']);
                $tbu->__SET('usuario', $_POST['usuario']);
                $tbu->__SET('pwd', $_POST['pwd']);
                $tbu->__SET('nombres', $_POST['nombres']);
                $tbu->__SET('apellidos', $_POST['apellidos']);
                $tbu->__SET('email', $_POST['email']);
                $tbu->__SET('estado', 2);
                $dtu->editUser($tbu);

                header("Location: /ProyectoKermesse/tbl_Usuario.php?msj=3");

            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_Usuario.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

    if ($_GET)
{
    try
    {

        $tbu->__SET('id_usuario', $_GET['delUser']);
        $dtu->deleteUser($tbu->__GET('id_usuario'));
        header("Location: /ProyectoKermesse/tbl_Usuario.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Usuario.php?msj=6");
        die($e->getMessage());
    }
}

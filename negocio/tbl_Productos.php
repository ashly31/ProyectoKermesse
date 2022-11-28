<?php

include_once("../entidades/tbl_productos.php");
include_once("../datos/Dt_Productos.php");

$tbu = new Tbl_productos();
$dtu = new Dt_Productos();

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
                $tbu->__SET('id_comunidad', $_POST['id_comunidad']);
                $tbu->__SET('id_cat_producto', $_POST['id_cat_producto']);
                $tbu->__SET('nombre', $_POST['nombre']);
                $tbu->__SET('descripcion', $_POST['descripcion']);
                $tbu->__SET('preciov_sugerido', $_POST['preciov_sugerido']);
                $tbu->__SET('estado', 1);

                $dtu->insertProd($tbu);
                //var_dump($emp);
                header("Location: /ProyectoKermesse/tbl_Productos.php?msj=1");
            }
            catch (Exception $ex)
            {
                header("Location: /ProyectoKermesse/tbl_Productos.php?msj=2");
                die($ex->getMessage());
            }
            break;

        case '2':
            try
            {
                if($_POST['confpass'] != $_POST['pass']){
                    header("Location: /ProyectoKermesse/productos/editar_productos.php?msj=5&varEnter={$_POST['idProd']}");
                    die();
                }
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tbu->__SET('id_producto', $_POST['idProd']);
                $tbu->__SET('id_comunidad', $_POST['id_comunidad']);
                $tbu->__SET('id_cat_producto', $_POST['id_cat_producto']);
                $tbu->__SET('nombre', $_POST['name']);
                $tbu->__SET('descripcion', $_POST['description']);
                $tbu->__SET('cantidad', $_POST['cantidad']);
                $tbu->__SET('preciov_sugerido', $_POST['preciov_sugerido']);

                $dtu->editProd($tbu);

                header("Location: /ProyectoKermesse/tbl_Productos.php?msj=3");
            }
            catch (Exception $e)
            {
                header("Location: /Kermesse/tbl_Productos.php?msj=4");
                die($e->getMessage());
            }

            break;
    }

}

if ($_GET)
{
    try
    {

        $tbu->__SET('id_producto', $_GET['delProd']);
        $dtu->deleteProd($tbu->__GET('id_producto'));
        header("Location: /ProyectoKermesse/tbl_Productos.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /ProyectoKermesse/tbl_Productos.php?msj=6");
        die($e->getMessage());
    }
}

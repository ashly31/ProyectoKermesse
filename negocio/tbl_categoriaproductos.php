<?php

include_once("../entidades/tbl_categoria_producto.php");
include_once("../datos/Dt_categoriaProducto.php");

$cp = new Tbl_categoria_producto();
$dcp = new Dt_categoriaProducto();

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
                $cp->__SET('id_categoria_producto', $_POST['id_categoria_producto']);
                $cp->__SET('nombre', $_POST['nombre']);
                $cp->__SET('descripcion', $_POST['descripcion']);
                $cp->__SET('estado', $_POST['estado']);

                $dcp->insertCP($cp);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_categoriaProducto.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_categoriaProducto.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $cp->__SET('id_categoria_producto', $_POST['idCP']);
                $cp->__SET('nombre', $_POST['nombre']);
                $cp->__SET('descripcion', $_POST['desc']);
                $cp->__SET('estado', $_POST['estado']);
        
                $dpc->editCP($cp);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_categoria_producto.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_categoria_producto.php?msj=4");
                die($e->getMessage());
            }
            break;
        
        default:
            # code...
            break;
    }


}


if ($_GET) 
{
    try 
    {
        
        $cp->__SET('id_categoria_producto', $_GET['delCP']);
        $dcp->deleteCP($cp->__GET('id_categoria_producto'));
        header("Location: /Kermesse/tbl_categoriaProducto.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /Kermesse/tbl_categoriaProducto.php?msj=6");
        die($e->getMessage());
    }
}

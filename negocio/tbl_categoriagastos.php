<?php

include_once("../entidades/tbl_categoria_gastos.php");
include_once("../datos/Dt_categoriaGastos.php");

$cg = new Tbl_categoria_gastos();
$dcg = new Dt_categoriaGastos();

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
                $cg->__SET('id_categoria_gastos', $_POST['id_categoria_gastos']);
                $cg->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $cg->__SET('descripcion', $_POST['descripcion']);
                $cg->__SET('estado', $_POST['estado']);

                $dcg->insertCG($cg);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_categoriaGastos.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_categoriaGastos.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $cg->__SET('id_categoria_gastos', $_POST['idCG']);
                $cg->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $cg->__SET('descripcion', $_POST['desc']);
                $cg->__SET('estado', $_POST['estado']);
        
                $dcg->editCG($cg);
                //var_dump($emp);
                header("Location: /Kermesse/tbl_categoriaGastos.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /Kermesse/tbl_categoriaGastos.php?msj=4");
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
        
        $cg->__SET('id_categoria_gastos', $_GET['delCG']);
        $dcg->deleteCG($acd->__GET('id_categoriagastos'));
        header("Location: /Kermesse/tbl_arqueoCaja_det.php?msj=5");
    }
    catch(Exception $e) 
    {
        header("Location: /Kermesse/tbl_categoria_gastos.php?msj=6");
        die($e->getMessage());
    }
}

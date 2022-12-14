<?php

include '../entidades/tbl_arqueocaja_det.php';
include '../datos/Dt_arqueoCaja_det.php';

$dacd = new Dt_arqueoCaja_det();
$acd = new tbl_arqueocaja_det(); 

//variable de control msj
$varIdACD = 0;
if(isset($varIdACD))
{
$varIdACD = $_GET['editACD']; //RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EL AC
}

//OBTENEMOS LOS DATOS DEL AC PARA SER EDITADO
$acd = $dacd->getACDByID($varIdACD);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina web oficial de registro, administracion y manutencion de los fondos de la Kermes Parroquia Corazon de Jesus Maria de las Palmas">
    <meta name="author" content="ABIMA TEAM">

    <title>Kermesse - Editar ACD</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Icons kit-->
    <script src="https://kit.fontawesome.com/6aba70b797.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
            <div class="sidebar-brand-icon">
                <i class="fa-solid fa-bomb"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Kermesse <sup>Parroquia </sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-2">

        <li class="nav-item active">
            <a class="nav-link" href="../index.php">
                <i class="fa-solid fa-house-chimney"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Entidades
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#collapse" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-table-list"></i>
                <span>Tablas</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tablas de registros: </h6>
                    <a class="collapse-item" href="../tbl_arqueoCaja_det.php">Arqueo caja det</a>
                    <a class="collapse-item" href="../tbl_arqueoCaja.php">Arqueo caja</a>
                    <a class="collapse-item" href="../tbl_categoriaGastos.php">Categor??as Gastos</a>
                    <a class="collapse-item" href="../tbl_categoriaProducto.php">Categor??as Productos</a>
                    <a class="collapse-item" href="../tbl_Comunidad.php">Comunidad</a>
                    <a class="collapse-item" href="../tbl_controlBonos.php">Control Bonos</a>
                    <a class="collapse-item" href="../tbl_Denominacion.php">Denominaci??n</a>
                    <a class="collapse-item" href="../tbl_Gastos.php">Gastos</a>
                    <a class="collapse-item" href="../tbl_ingresoComunidad_det.php">Ingreso Comunidad Det</a>
                    <a class="collapse-item" href="../tbl_ingresoComunidad.php">Ingreso Comunidad</a>
                    <a class="collapse-item" href="../tbl_kermesse.php">Kermesse</a>
                    <a class="collapse-item" href="../tbl_listaPrecio.php">Lista Precio</a>
                    <a class="collapse-item" href="../tbl_listaPrecioDet.php">Lista Precio Det</a>
                    <a class="collapse-item" href="../tbl_Moneda.php">Moneda</a>
                    <a class="collapse-item" href="../tbl_Opciones.php">Opciones</a>
                    <a class="collapse-item" href="../tbl_Parroquia.php">Parroquia</a>
                    <a class="collapse-item" href="../tbl_Productos.php">Productos</a>
                    <a class="collapse-item" href="../tbl_Rol.php">Rol</a>
                    <a class="collapse-item" href="../tbl_Tasacambio.php">Tasa Cambio</a>
                    <a class="collapse-item" href="../tbl_Usuario.php">Usuario</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-address-card"></i>
                <span>Registros</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Roles y otros:</h6>
                    <a class="collapse-item" href="../tbl_rolOpciones.php">Opciones de rol</a>
                    <a class="collapse-item" href="../tbl_rolUsuario.php">Rol de usuario</a>
                    <a class="collapse-item" href="../tbl_tasacambio_det.php">Tasa de Cambio Det</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Complementos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>P??ginas</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Cuenta: </h6>
                    <a class="collapse-item" href="../login.php">Login</a>
                    <a class="collapse-item" href="../registro.php">Registro</a>
                    <a class="collapse-item" href="../olvido_Contra.php">Olvido de Contrase??a</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="../nosotros.php">
                <i class="fa-solid fa-users-between-lines"></i>
                <span>Sobre nosotros</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- Nav Item - Alerts -->
                <!-- Nav Item - Messages -->
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-550 small">ABIMA</span>
                        <i class="fa-solid fa-circle-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Configuraci??n
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar sesi??n
                        </a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-0 text-gray-800">ArqueoCaja Det</h1>
            <p class="mb-4">En este formulario podr?? editar ACD existentes.
            </p>
            <!-- editar ACD -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                  Editar ArqueoCaja Det
                </div>
                <div class="card-body">
                    <form method="POST" action="../negocio/tbl_arqueocajaDet.php">
                        <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>

                        <div class="form-floating mb-3">
                            <label for="idArqueoCaja_Det">ID ACD</label>
                              <input class="form-control" id="idArqueoCaja_Det" name="idArqueoCaja_Det" type="text" readonly required/> 
                        </div>

                        <div class="form-floating mb-3">
                            <label for="idArqueoCaja">idArqueoCaja</label>
                            <input class="form-control" id="idArqueoCaja" name="idArqueoCaja" type="text" readonly required/>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="idMoneda">idMoneda</label>
                            <input class="form-control" id="idMoneda" name="idMoneda" type="text" readonly required/>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="idDenominacion">idDenominacion</label>
                            <input class="form-control" id="idDenominacion" name="idDenominacion" type="text" readonly required/>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="cantidad">cantidad: </label>
                            <input class="form-control" id="cantidad" name="cantidad" type="decimal" title="Ingrese la cantidad" required/>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="subtotal">subtotal</label>
                            <input class="form-control" id="subtotal" name="subtotal" type="decimal" title="Ingrese su subtotal" required/>
                        </div>

                        <div class="d-flex align-items-end justify-content-end mt-4 mb-0 gap-3">
                            <input class="btn btn-primary" type="submit" value="Guardar"/>
                            <a href="../tbl_arqueoCaja_det.php"> <button type="button" class="btn btn-info">Cancelar</button> </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end of editar AC -->
        </div>
        <!-- end begin -->


        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; ABIMA 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">??Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <div class="modal-body">Seleccionar "Cerrar sesi??n" a continuaci??n si est?? listo para finalizar su sesi??n actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="../login.php">Cerrar sesi??n</a>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

<script>
    ////// FUNCION PARA CARGAR LOS VALORES EN LOS CONTROLES
    function setValores()
    {
        $("#idArqueoCaja_Det").css("background-color", "#E3E4E5");
        $("#idArqueoCaja_Det").val("<?php echo $acd->__GET('idArqueoCaja_Det') ?>");
        $("#idArqueoCaja").val("<?php echo $acd->__GET('idArqueoCaja') ?>");
        $("#idArqueoCaja").css("background-color", "#E3E4E5");
        $("#idMoneda").val("<?php echo $acd->__GET('idMoneda') ?>");
        $("#idMoneda").css("background-color", "#E3E4E5");
        $("#idDenominacion").val("<?php echo $acd->__GET('idDenominacion') ?>");
        $("#idDenominacion").css("background-color", "#E3E4E5");
        $("#cantidad").val("<?php echo $acd->__GET('cantidad') ?>");
        $("#subtotal").val("<?php echo $acd->__GET('subtotal') ?>");
    }

    $(document).ready(function ()
    {
        // CARGAMOS LOS VALORES EN LOS CONTROLES //
        setValores();
    });

</script>
</body>

</html>
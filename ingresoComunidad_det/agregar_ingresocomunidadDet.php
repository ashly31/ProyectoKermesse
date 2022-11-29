<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina web oficial de registro, administracion y manutencion de los fondos de la Kermes Parroquia Corazon de Jesus Maria de las Palmas">
    <meta name="author" content="ABIMA TEAM">

    <title>Kermesse - Agregar Ingreso Comunidad Det</title>

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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
                <i class="fa-solid fa-bomb"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Kermesse <sup>Parroquia </sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-2">

        <li class="nav-item active">
            <a class="nav-link" href="index.php">
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
                    <a class="collapse-item" href="tbl_arqueoCaja_det.php">Arqueo caja det</a>
                    <a class="collapse-item" href="tbl_arqueoCaja.php">Arqueo caja</a>
                    <a class="collapse-item" href="tbl_categoriaGastos.php">Categorías Gastos</a>
                    <a class="collapse-item" href="tbl_categoriaProducto.php">Categorías Productos</a>
                    <a class="collapse-item" href="tbl_Comunidad.php">Comunidad</a>
                    <a class="collapse-item" href="tbl_controlBonos.php">Control Bonos</a>
                    <a class="collapse-item" href="tbl_Denominacion.php">Denominación</a>
                    <a class="collapse-item" href="tbl_Gastos.php">Gastos</a>
                    <a class="collapse-item" href="tbl_ingresoComunidad_det.php">Ingreso Comunidad Det</a>
                    <a class="collapse-item" href="tbl_ingresoComunidad.php">Ingreso Comunidad</a>
                    <a class="collapse-item" href="tbl_kermesse.php">Kermesse</a>
                    <a class="collapse-item" href="tbl_listaPrecio.php">Lista Precio</a>
                    <a class="collapse-item" href="tbl_listaPrecioDet.php">Lista Precio Det</a>
                    <a class="collapse-item" href="tbl_Moneda.php">Moneda</a>
                    <a class="collapse-item" href="tbl_Opciones.php">Opciones</a>
                    <a class="collapse-item" href="tbl_Parroquia.php">Parroquia</a>
                    <a class="collapse-item" href="tbl_Productos.php">Productos</a>
                    <a class="collapse-item" href="tbl_Rol.php">Rol</a>
                    <a class="collapse-item" href="tbl_Tasacambio.php">Tasa Cambio</a>
                    <a class="collapse-item" href="tbl_Usuario.php">Usuario</a>
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
                    <a class="collapse-item" href="tbl_rolOpciones.php">Opciones de rol</a>
                    <a class="collapse-item" href="tbl_rolUsuario.php">Rol de usuario</a>
                    <a class="collapse-item" href="tbl_tasacambio_det.php">Tasa de Cambio Det</a>
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
                <span>Páginas</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Cuenta: </h6>
                    <a class="collapse-item" href="login.php">Login</a>
                    <a class="collapse-item" href="registro.php">Registro</a>
                    <a class="collapse-item" href="olvido_Contra.php">Olvido de Contraseña</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="nosotros.php">
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
                            Configuración
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar sesión
                        </a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-0 text-gray-800">Ingreso Comunidad Det</h1>
            <p class="mb-4">En este formulario podrá registrar los datos de un ingreso de comunidad det.
            </p>
            <!-- Agregar AC -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Nuevo Ingreso Comunidad Det
                </div>
                <div class="card-body">
                    <form method="POST" action="../negocio/tbl_ingresocomunidadDet.php">
                        <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                        <div class="form-floating mb-3">
                            <label for="id_ingreso_comunidad_det">ID Ingreso Comunidad Det:</label>
                            <input class="form-control" id="id_ingreso_comunidad_det" name="id_ingreso_comunidad_det" type="text" title="Ingrese ID de Comunidad Det" required/>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="id_ingreso_comunidad">ID Ingreso Comunidad:</label>
                            <input class="form-control" id="id_ingreso_comunidad" name="id_ingreso_comunidad" type="text" title="Ingrese ID de Comunidad" required/>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="id_bono">ID Bono:</label>
                            <input class="form-control" id="id_bono" name="id_bono" type="text" title="Ingrese ID de Bono" required/>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="denominacion">Denominación:</label>
                            <input class="form-control" id="denominacion" name="denominacion" type="text" title="Ingrese la denominación" required/>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="cantidad">Cantidad:</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="text" title="Ingrese la cantidad" required/>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="subtotal_bono">Subtotal Bono:</label>
                            <input class="form-control" id="subtotal_bono" name="subtotal_bono" type="number" title="Ingrese el subtotal del bono" required/>
                        </div>
                        <div class="d-flex align-items-end justify-content-end mt-4 mb-0 gap-3">
                            <input class="btn btn-primary" type="submit" value="Guardar"/>
                            <input class="btn btn-danger" type="reset" value="Cancelar"/>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- end of Agregar AC -->
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
                <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccionar "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="login.php">Cerrar sesión</a>
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

</body>

</html>
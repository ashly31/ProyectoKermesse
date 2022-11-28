<?php

//error_reporting(0);
//COMIENZA EL CODIGO DE SEGURIDAD

//IMPORTAMOS ENTIDADES
include 'entidades/tbl_usuario.php';
include 'entidades/tbl_rol.php';
include 'entidades/tbl_opciones.php';
//IMPORTAMOS DATOS
include 'datos/Dt_Usuario.php';
include 'datos/Dt_Rol.php';
include 'datos/Dt_Opciones.php';

//ENTIDADES
$usuario = new Tbl_Usuario();
$rol = new Tbl_Rol();
$listOpc = new Tbl_Opciones;
//DATOS
$dtu = new Dt_Usuario();
$dtr = new Dt_Rol();
$dtOpc = new Dt_Opciones();




//variable de control msj
$varMsj = 0;
if(isset($_GET['$varMsj']))
{
    $varMsj = $_GET['varMsj'];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina web oficial de registro, administracion y manutencion de los fondos de la Kermes Parroquia Corazon de Jesus Maria de las Palmas">
    <meta name="author" content="ABIMA TEAM">

    <title>Kermesse - Gestión de Usuarios</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Icons kit-->
    <script src="https://kit.fontawesome.com/6aba70b797.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="shortcut icon" type="icon-x" src="/img/logo-kermes.png">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                        <!--    <h6 class="collapse-header">Otras Páginas:</h6>
                    <a class="collapse-item" href="404.html">Página 404</a>
                    <a class="collapse-item" href="blank.html">Página en Blanco</a> -->
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
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Centro de Alertas
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las Alertas!</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Centro de Mensajes
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

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
                    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
                    <p class="mb-4">Un usuario es aquel individuo que utiliza
                        de manera habitual un producto, o servicio.
                        Es un concepto muy utilizado en el sector informático y digital.
                        <a href="usuario/agregar_usuario.php">
                           <br> <i class="fa fa-plus-square"></i> Agregar</a>.
                    </p>

                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl_Usuario" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_usuario</th>
                                            <th>usuario</th>
                                            <th>nombres</th>
                                            <th>apellidos</th>
                                            <th>email</th>
                                            <th>estado</th>
                                            <th>opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id_usuario</th>
                                            <th>usuario</th>
                                            <th>nombres</th>
                                            <th>apellidos</th>
                                            <th>email</th>
                                            <th>estado</th>
                                            <th>opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($dtu->listarIngresoUsuario() as $r) :
                                            $estadoUser = "";
                                            if ($r->__GET('estado') == 1 || $r->__GET('estado') == 2) {
                                                $estadoUser = "Activo";
                                            } else {
                                                $estadoUser = "Inactivo";
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $r->__GET('id_usuario');  ?></td>
                                                <td><?php echo $r->__GET('usuario');  ?></td>
                                                <td><?php echo $r->__GET('nombres');  ?></td>
                                                <td><?php echo $r->__GET('apellidos');  ?></td>
                                                <td><?php echo $r->__GET('email');  ?></td>
                                                <td><?php echo  $estadoUser ?></td>
                                                <td>
                                                    <a href="usuario/visualizar_usuario.php?viewU=<?php echo $r->__GET('id_usuario'); ?>" title="Visualizar los datos">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>&nbsp;
                                                    <a href="usuario/editar_usuario.php?editU=<?php echo $r->getIdUsuario();
                                                    ?>" title="Modificar los datos">
                                                        <i class="fa-solid fa-user-pen"></i>
                                                    </a>&nbsp;
                                                    <a href="negocio/tbl_Usuario.php?delUser=<?php echo $r->__GET('id_usuario');
                                                    ?>"  title="Eliminar los datos">
                                                        <i class="fa-solid fa-user-minus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                           
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end of datatables -->

                </div>
                <!-- end begin -->

            </div>
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
    <!-- EXTRA -->
    <!-- jQuery -->
    <script src="js/scripts.js"></script>
    <script src="DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <!-- JS DATATABLES -->
    <script src="./DataTables/datatables.min.js"></script>
    <!--<script src="./DataTables/Responsive-2.3.0/js/responsive.bootstrap5.min.js"></script>-->
    <script src="./DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="./DataTables/Responsive-2.3.0/js/responsive.dataTables.min.js"></script>
    <script src="./DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="./DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="./DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="./DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="./DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="./DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="./DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
    <script src="./DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>
    <!-- jAlert js -->
    <script src="./jAlert/dist/jAlert.min.js"></script>
    <script src="./jAlert/dist/jAlert-functions.min.js">
        //optional!!
    </script>
    <!-- END EXTRA -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
        $(document).ready(function() {
            /////////// VARIABLE DE CONTROL MSJ ///////////
            var mensaje = 0;
            mensaje = "<?php echo $varMsj ?>";

            if (mensaje == "1") {
                successAlert('Éxito', 'Los datos han sido registrados exitosamente!');
            }
            /////////// DATATABLE ///////////
            $(document).ready(function() {

                $("#tbl_Usuario").DataTable({
                    "data": mensaje,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "pdf", "print"],
                    "language": {
                        "aria": {
                            "sortAscending": "Activar para ordenar la columna de manera ascendente",
                            "sortDescending": "Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "collection": "Colección",
                            "colvis": "Visibilidad",
                            "colvisRestore": "Restaurar visibilidad",
                            "copy": "Copiar",
                            "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                            "copySuccess": {
                                "1": "Copiada 1 fila al portapapeles",
                                "_": "Copiadas %d fila al portapapeles"
                            },
                            "copyTitle": "Copiar al portapapeles",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Mostrar todas las filas",
                                "_": "Mostrar %d filas"
                            },
                            "pdf": "PDF",
                            "print": "Imprimir",
                            "createState": "Crear Estado",
                            "removeAllStates": "Borrar Todos los Estados",
                            "removeState": "Borrar Estado",
                            "renameState": "Renombrar Estado",
                            "savedStates": "Guardar Estado",
                            "stateRestore": "Restaurar Estado",
                            "updateState": "Actualizar Estado"
                        },
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "searchBuilder": {
                            "add": "Añadir condición",
                            "button": {
                                "0": "Constructor de búsqueda",
                                "_": "Constructor de búsqueda (%d)"
                            },
                            "clearAll": "Borrar todo",
                            "condition": "Condición",
                            "deleteTitle": "Eliminar regla de filtrado",
                            "leftTitle": "Criterios anulados",
                            "logicAnd": "Y",
                            "logicOr": "O",
                            "rightTitle": "Criterios de sangría",
                            "title": {
                                "0": "Constructor de búsqueda",
                                "_": "Constructor de búsqueda (%d)"
                            },
                            "value": "Valor",
                            "data": "Datos"
                        },
                        "searchPanes": {
                            "clearMessage": "Borrar todo",
                            "collapse": {
                                "0": "Paneles de búsqueda",
                                "_": "Paneles de búsqueda (%d)"
                            },
                            "count": "{total}",
                            "emptyPanes": "Sin paneles de búsqueda",
                            "loadMessage": "Cargando paneles de búsqueda",
                            "title": "Filtros Activos - %d",
                            "countFiltered": "{shown} ({total})",
                            "collapseMessage": "Colapsar",
                            "showMessage": "Mostrar Todo"
                        },
                        "decimal": ".",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "zeroRecords": "No se encontraron coincidencias",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "stateRestore": {
                            "removeTitle": "Eliminar",
                            "creationModal": {
                                "search": "Buscar"
                            }
                        },
                        "infoEmpty": "No hay datos para mostrar"
                    }
                }).buttons().container().appendTo('#tbl_Usuario_wrapper .col-md-6:eq(0)');

            });



        }); //FIN  $(document).ready()
    </script>
</body>

</html>
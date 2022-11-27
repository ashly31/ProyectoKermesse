<?php

//error_reporting(0);
//IMPORTAMOS ENTIDADES Y DATOS

include '../entidades/tbl_gastos.php';
include '../datos/Dt_Gastos.php';

$dtg = new Dt_Gastos();
$g = new tbl_gastos();


//variable de control msj
$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['viewU']; //RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR EL USUARIO
}

//OBTENEMOS LOS DATOS DEL USUARIO PARA SER CONSULTADO
$dtg = $g->getGastosByID($varIdU);

?>

<?php
require_once '../entidades/tbl_usuario.php';
require_once '../datos/Dt_Gastos.php';

if (isset($_POST['m'])) {
    $metodo = $_POST['m'];
    if (method_exists("Dt_Gastos.php", $metodo)) {
        Dt_Gastos::{$metodo}();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Visualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                   aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                               aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="html/login.html">Login</a>
                                    <a class="nav-link" href="html/register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                               data-bs-target="#pagesCollapseError" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                 data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="html/404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="html/charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="html/tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Visualizar Usuario</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="entidades/tbl_gastos.php">Gestión Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Visualizar Usuario
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        En este formulario podrá visualizar los datos de los gastos registrados del sistema.
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Nuevo Gasto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="./#">
                            <div class="form-floating mb-3">
                                <label for="idKermesse">ID Kermesse:</label>
                                <input class="form-control" id="idKermesse" name="idKermesse" type="id" readonly
                                       required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="idCatGastos">ID Cat Gastos:</label>
                                <input class="form-control" id="idCatGastos" name="idCatGastos" type="id" readonly
                                       required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="fechaGasto">Fecha Gasto:</label>
                                <input class="form-control" id="fechaGasto" name="fechaGasto" type="date" readonly
                                       required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="concepto">Concepto:</label>
                                <input class="form-control" id="concepto" name="concepto" type="text" readonly
                                       required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="monto">Monto:</label>
                                <input class="form-control" id="monto" name="monto" type="decimal" readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="usuario_creacion">Usuario Creación:</label>
                                <input class="form-control" id="usuario_creacion" name="usuario_creacion" type="text"
                                       readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="fecha_creacion">Fecha Creación:</label>
                                <input class="form-control" id="fecha_creacion" name="fecha_creacion" type="date"
                                       readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="usuario_modificacion">Usuario Modificacion:</label>
                                <input class="form-control" id="usuario_modificacion" name="usuario_modificacion"
                                       type="text" readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="fecha_modificacion">Fecha Modificacion:</label>
                                <input class="form-control" id="fecha_modificacion" name="fecha_modificacion"
                                       type="date" readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="usuario_eliminacion">Usuario Eliminación:</label>
                                <input class="form-control" id="usuario_eliminacion" name="usuario_eliminacion"
                                       type="text" readonly required/>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="fecha_eliminacion">Fecha Eliminacion:</label>
                                <input class="form-control" id="fecha_eliminacion" name="fecha_eliminacion" type="date"
                                       readonly required/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="js/scripts.js"></script>
<script src="DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

<script>
    ////// FUNCION PARA CARGAR LOS VALORES EN LOS CONTROLES
    function setValores() {
        $("#id_user").css("background-color", "#E3E4E5");
        $("#id_user").val("<?php echo $dtg->__GET('id_usuario') ?>");

        $("#user").css("background-color", "#E3E4E5");
        $("#user").val("<?php echo $dtg->__GET('usuario') ?>");

        $("#nombres").css("background-color", "#E3E4E5");
        $("#nombres").val("<?php echo $dtg->__GET('nombres') ?>");

        $("#apellidos").css("background-color", "#E3E4E5");
        $("#apellidos").val("<?php echo $dtg->__GET('apellidos') ?>");

        $("#email").css("background-color", "#E3E4E5");
        $("#email").val("<?php echo $dtg->__GET('email') ?>");

    }

    function regresar() {
        window.location.href = "entidades/tbl_gastos.php";
    }

    $(document).ready(function () {
        // CARGAMOS LOS VALORES EN LOS CONTROLES //
        setValores();
    });

</script>
</body>
</html>

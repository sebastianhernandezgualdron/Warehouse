<?php
require_once "./classes/compra.php";
require_once "./classes/venta.php";

$compras = Compra::compraProductos();
$ventas = Venta::ventaProductos();

$preciosFormateados = array();
$preciosFormateados2 = array();
$totalVentasYCompras = array();
$valoresCompra = 0;
$valoresVenta = 0;



foreach ($compras as $item) {
    $producto = $item["nombre_producto"];
    $totalCompra = $item["cant_compra"] * $item["precio_proveedor"];
    $formattedTotal = number_format($totalCompra, 2, ',', '.');

    if (array_key_exists($producto, $preciosFormateados)) {
        $preciosFormateados[$producto] += $totalCompra;
    } else {
        $preciosFormateados[$producto] = $totalCompra;
    }
}

foreach ($ventas as $item) {
    $producto2 = $item["nombre_producto"];
    $totalCompra2 = $item["cant_venta"] * $item["precio_venta"];
    $formattedTotalVentas2 = number_format($totalCompra2, 2, ',', '.');

    if (array_key_exists($producto2, $preciosFormateados2)) {
        $preciosFormateados2[$producto2] += $totalCompra2;
    } else {
        $preciosFormateados2[$producto2] = $totalCompra2;
    }
}

foreach ($compras as $item) {
    $valoresCompra = $valoresCompra + ($item["cant_compra"] * $item["precio_proveedor"]);
    $formattedTotalCompra = number_format($valoresCompra, 2, ',', '.');
}

foreach ($ventas as $item) {
    $valoresVenta = $valoresVenta + ($item["cant_venta"] * $item["precio_venta"]);
    $formattedTotalVenta = number_format($valoresVenta, 2, ',', '.');
}

$totalVentasYCompras[0] = $valoresCompra;
$totalVentasYCompras[1] = $valoresVenta;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ventas y Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand ps-3" href="index.php">Inicio</a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>



        <ul class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
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
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Busqueda</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Registros
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="./Formularios.php">Formularios</a>
                                <a class="nav-link" href="./VentasCompras.php">Ventas y Compras</a>
                                <a class="nav-link" href="./tienda.php">Tienda</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Cuenta
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="register.php">Registrarse</a>
                                <a class="nav-link collapsed" href="login.html">Inicio de Sesion</a>
                                <a class="nav-link collapsed" href="password.html">Olvidaste tu contraseña?</a>


                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Informacion Grafica</div>

                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tablas
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Inicio de sesion como:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Precio Total por Productos Comprados
                                </div>
                                <div class="card-body">
                                    <canvas id="Dona" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Otra prueba de diagrama de círculo
                                </div>
                                <div class="card-body">
                                    <canvas id="DonaVenta" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Registro de compras y ventas
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header">
                                            Registro de Compras
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($compras as $item) : ?>
                                                <?php
                                                $totalCompra = $item["cant_compra"] * $item["precio_proveedor"];
                                                $formattedTotal = number_format($totalCompra, 2, ',', '.');
                                                ?>
                                                <script>
                                                    var preciosFormateados = <?php echo json_encode($preciosFormateados); ?>;
                                                </script>
                                                <li class="list-group-item">
                                                    Se compraron <?php echo $item["cant_compra"]; ?> unidades de <?php echo $item["nombre_producto"]; ?> por: $<?php echo $formattedTotal; ?>
                                                </li>
                                            <?php endforeach; ?>
                                                
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header">
                                            Registro de Compras
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($ventas as $item) : ?>
                                                <?php
                                                $totalCompra2 = $item["cant_venta"] * $item["precio_venta"];
                                                $formattedTotalVentas2 = number_format($totalCompra2, 2, ',', '.');
                                                ?>
                                                <script>
                                                    var preciosFormateados2 = <?php echo json_encode($preciosFormateados2); ?>;
                                                </script>
                                                <li class="list-group-item">
                                                    Se compraron <?php echo $item["cant_venta"]; ?> unidades de <?php echo $item["nombre_producto"]; ?> al cliente <?php echo $item["id_cliente"]; ?>  por: $<?php echo $formattedTotalVentas2; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Mi pagina OwO</div>
                        <div>
                            <a href="#">Derechos</a>
                            &middot;
                            <a href="#">Terminos de uso</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
     var totalVentasYCompras = <?php echo json_encode($totalVentasYCompras); ?>;
     </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="JS/Dona.js"></script>
    <script src="JS/DonaVentas.js"></script>
    <script src="JS/DonaResumen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="JS/OcultarBarra.js"></script>
    <script src="JS/compraVenta.js"></script>
    <script>
        $(document).ready(function() {
            $('#DTadmins').DataTable();
        });
    </script>
</body>

</html>
<?php

require_once "./classes/tienda.php";
require_once "./classes/cliente.php";
require_once "./classes/producto.php";
require_once "./classes/productoEnTienda.php";


$mostarPT = ProductoEnTienda::ProductoEnTienda();

$tiendaId = Tienda::mostrar();
$cliente = Cliente::mostrar();
$producto = Producto::mostrar();


$tiendas = Tienda::mostrar();
$tiendasJSON = json_encode($tiendas);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Formularios </title>
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
                    <h1 class="mt-4">Formularios</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Principal</a></li>
                        <li class="breadcrumb-item active">Formularios</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="./classes/ids.php" id="form">
                                <p>Producto: <select name="productoTien">
                                        <option selected>Elija su tienda</option>
                                        <?php foreach ($tiendaId as $item) : ?>
                                            <option value="<?php
                                                            echo $item["id_tienda"] ?>"><?php echo $item["nombre"] ?></option>
                                        <?php endforeach ?>
                                    </select></p>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="hide">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Registro de Ventas
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="./classes/registroVenta.php">
                                        <p>Cantidad vendida: <input type="text" name="cantV"></p>
                                        <p>fecha: <input type="date" name="fechaV"></p>
                                        <p>Cliente: <select name="clienteV">
                                                <?php foreach ($cliente as $item) : ?>
                                                    <option value="<?php echo $item["id_cliente"] ?>"><?php echo $item["id_cliente"] ?></option>
                                                <?php endforeach ?>
                                            </select></p>
                                        <p>Producto: <select name="productoV">
                                                <?php foreach ($producto as $item) : ?>
                                                    <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["nombre_producto"] ?></option>
                                                <?php endforeach ?>
                                            </select></p>
                                        <p>Tienda a la que pertenece: <select name="TiendaP" class="form-select">

                                                <option id="ids2"></option>
                                            </select></p>
                                        <p><input type="submit" value="Enviar"></p>
                                    </form>
                                </div>
                                <div class="card-footer small text-muted"><a href="./tables.php#DTVenta">Tabla de Ventas</a></div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="hide">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Registro de productos por tienda
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="./classes/registroProductoTienda.php">
                                        <p>Cantidad en tienda: <input type="text" name="cantPorT"></p>
                                        <p>Fecha: <input type="date" name="fechaT"></p>
                                        <p>Repartidor: <input type="text" name="repaT"></p>
                                        <p>Producto: <select name="productoT">
                                                <?php foreach ($producto as $item) : ?>
                                                    <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["nombre_producto"] ?></option>
                                                <?php endforeach ?>
                                            </select></p>
                                        <p>Tienda a la que pertenece: <select name="TiendaP" class="form-select">
                                                <option id="ids"></option>
                                            </select></p>
                                        <p><input type="submit" value="Enviar"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="hide" class="card mb-4" >
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Productos en Tiendas
                        </div>
                        <div  class="card-body">
                            <table id="DTProductosT">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cantidad en tienda </th>
                                        <th>Fecha </th>
                                        <th>Repartidor</th>
                                        <th>Producto</th>
                                        <th>Tienda</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostarPT as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_producto_en_tienda"]  ?></td>
                                            <td><?php echo  $item["cant_por_tienda"] ?></td>
                                            <td><?php echo  $item["fecha"] ?></td>
                                            <td><?php echo  $item["repartidor"] ?></td>
                                            <td><?php echo  $item["nombre_producto"] ?></td>
                                            <td><?php echo  $item["id_tienda"]  ?></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted"><a href="./tables.php#DTProductosT">Tabla de Productos por Tienda</a></div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
    <script>
        var tiendas = <?php echo $tiendasJSON; ?>;
    </script>
    <script>
        $(document).ready(function() {
            $('#DTProductosT').DataTable();
        });
    </script>
    <script src="JS/OcultarBarra.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./JS/tienda.js"></script>


</body>

</html>
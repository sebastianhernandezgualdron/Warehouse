<?php
require_once "./classes/administrador.php";
require_once "./classes/tienda.php";
require_once "./classes/cliente.php";
require_once "./classes/compra.php";
require_once "./classes/productoEnTienda.php";
require_once "./classes/producto.php";
require_once "./classes/proveedor.php";
require_once "./classes/venta.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "eliminar") {
    if (isset($_POST["id"])) {
        $adminId = $_POST["id"];
        Admin::eliminar($adminId);
    } elseif (isset($_POST["id_cliente"])) {
        $clienteId = $_POST["id_cliente"];
        Cliente::eliminar($clienteId);
    } elseif (isset($_POST["id_compra"])) {
        $compraId = $_POST["id_compra"];
        Compra::eliminar($compraId);
    } elseif (isset($_POST["id_producto"])) {
        $productoId = $_POST["id_producto"];
        Producto::eliminar($productoId);
    } elseif (isset($_POST["id_productoEnTienda"])) {
        $productoEnTiendaId = $_POST["id_productoEnTienda"];
        ProductoEnTienda::eliminar($productoEnTiendaId);
    } elseif (isset($_POST["id_proveedor"])) {
        $proveedor = $_POST["id_proveedor"];
        Proveedor::eliminar($proveedor);
    } elseif (isset($_POST["id_tienda"])) {
        $tienda = $_POST["id_tienda"];
        Tienda::eliminar($tienda);
    } elseif (isset($_POST["id_venta"])) {
        $venta = $_POST["id_venta"];
        Venta::eliminar($venta);
    }
}

$mostrarV = Venta::mostrar();
$mostrarT = Tienda::mostrar();
$mostrarProve = Proveedor::mostrar();
$mostarP = Producto::mostrar();
$mostarPT = ProductoEnTienda::mostrar();
$mostrarCo = Compra::mostrar();
$mostrarC = Cliente::mostrar();
$mostrar = Admin::mostrar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tablas</title>
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
                    <h1 class="mt-4">Tablas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tablas</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Todas las tablas de datos del almacén


                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Administradores Registrados
                        </div>
                        <div class="card-body">
                            <table id="DTadmins">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Tienda</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrar as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_admin"]  ?></td>
                                            <td><?php echo  $item["nombre_admin"] ?></td>
                                            <td><?php echo  $item["cargo"] ?></td>
                                            <td><?php echo  $item["usuario"]  ?></td>
                                            <td><?php echo $item["contraseña"] ?></td>
                                            <td><?php echo $item["id_tienda"]; ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-admin="<?php echo $item['id_admin']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_admin']; ?>"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Administrador</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroAdmin.php">
                                                                    <p>Administrador a editar: <select name="idA">

                                                                            <option value="<?php echo $item["id_admin"] ?>"><?php echo $item["id_admin"] ?></option>

                                                                        </select></p>
                                                                    <p>Nombre: <input type="text" placeholder="<?php echo $item["nombre_admin"] ?>" name="nomnreA"></p>
                                                                    <p>Cargo: <select name="cargoA">
                                                                            <option value="Manager">Manager</option>
                                                                            <option value="Security supervisor">Supervisor de Seguridad y Sanidad</option>
                                                                            <option value="Cashier">Cajero</option>
                                                                        </select></p>
                                                                    <p>Usuario: <input type="text" placeholder="<?php echo $item["usuario"] ?>" name="usuarioA"></p>
                                                                    <p>Contraseña: <input type="text" placeholder="<?php echo $item["contraseña"] ?>" name="contraseñaA"></p>
                                                                    <p>tienda: <select name="tiendaA" class="form-select" id="floatingSelect" aria-label="Floating label select example" name="tiendaA">
                                                                            <?php foreach ($mostrarT as $item) : ?>
                                                                                <option value="<?php echo $item["id_tienda"] ?>"><?php echo $item["nombre"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p><input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Clientes registrados
                        </div>
                        <div class="card-body">
                            <table id="DTClientes">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrarC as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_cliente"]; ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-cliente="<?php echo $item['id_cliente']; ?>">Eliminar</button>
                                                <button class="btn btn-primary">Editar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Productos Comprados
                        </div>
                        <div class="card-body">
                            <table id="DTCompras">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cantidad Comprada</th>
                                        <th>Precio del Proveedor</th>
                                        <th>Producto</th>
                                        <th>Proveedor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrarCo as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_compra"]  ?></td>
                                            <td><?php echo  $item["cant_compra"] ?></td>
                                            <td><?php echo  $item["precio_proveedor"] ?></td>
                                            <td><?php echo  $item["id_producto"]  ?></td>
                                            <td><?php echo $item["id_proveedor"] ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-compra="<?php echo $item['id_compra']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_compra']; ?>h"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_compra']; ?>h" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Compra</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroCompra.php">
                                                                    <p>Compra a Editar: <select name="idC">

                                                                            <option value="<?php echo $item["id_compra"] ?>"><?php echo $item["id_compra"] ?></option>

                                                                        </select></p>
                                                                    <p>Cantidad Comprada: <input type="text" placeholder="<?php echo $item["cant_compra"] ?>" name="cantC"></p>
                                                                    <p>Precio del proveedor: <input type="text" placeholder="<?php echo $item["precio_proveedor"] ?>" name="precioProvee"></p>
                                                                    <p>Producto: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="productoC">
                                                                            <?php foreach ($mostarP as $item) : ?>
                                                                                <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["nombre_producto"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p>
                                                                    <p>Proveedor: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="proveedorC">
                                                                            <?php foreach ($mostrarProve as $item) : ?>
                                                                                <option value="<?php echo $item["id_proveedor"] ?>"><?php echo $item["id_proveedor"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p><input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Productos en el almacén
                        </div>
                        <div class="card-body">
                            <table id="DTProductos">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre del producto </th>
                                        <th>Precio de venta</th>
                                        <th>Cantidad existente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostarP as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_producto"]  ?></td>
                                            <td><?php echo  $item["nombre_producto"] ?></td>
                                            <td><?php echo  $item["precio_venta"] ?></td>
                                            <td><?php echo  $item["cant_existente"]  ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-producto="<?php echo $item['id_producto']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_producto']; ?>g"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_producto']; ?>g" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroProducto.php">
                                                                    <p>Producto a Editar: <select name="idP">

                                                                            <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["id_producto"] ?></option>

                                                                        </select></p>
                                                                    <p>Nombre del producto: <input type="text" placeholder="<?php echo $item["nombre_producto"] ?>" name="nombreP"></p>
                                                                    <p>Precio de venta: <input type="text" placeholder="<?php echo $item["precio_venta"] ?>" name="precioP"></p>
                                                                    <p>Cantidad existente: <input type="text" placeholder="<?php echo $item["cant_existente"] ?>" name="cantP"></p>
                                                                    <input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Productos en Tiendas
                        </div>
                        <div class="card-body">
                            <table id="DTProductosT">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cantidad en tienda </th>
                                        <th>Fecha </th>
                                        <th>Repartidor</th>
                                        <th>Producto</th>
                                        <th>Tienda</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostarPT as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_producto_en_tienda"]  ?></td>
                                            <td><?php echo  $item["cant_por_tienda"] ?></td>
                                            <td><?php echo  $item["fecha"] ?></td>
                                            <td><?php echo  $item["repartidor"] ?></td>
                                            <td><?php echo  $item["id_producto"] ?></td>
                                            <td><?php echo  $item["id_tienda"]  ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-productoEnTienda="<?php echo $item['id_producto_en_tienda']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_producto_en_tienda']; ?>f"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_producto_en_tienda']; ?>f" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto en Tienda</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroProductoTienda.php">
                                                                    <p>Producto en Tienda a Editar: <select name="idPt">

                                                                            <option value="<?php echo $item["id_producto_en_tienda"] ?>"><?php echo $item["id_producto_en_tienda"] ?></option>

                                                                        </select></p>
                                                                    <p>Cantidad En la tienda: <input type="text" placeholder="<?php echo $item["cant_por_tienda"] ?>" name="cantPorT"></p>
                                                                    <p>Fecha: <input type="date" placeholder="<?php echo $item["fecha"] ?>" name="fechaT"></p>
                                                                    <p>Repartidor: <input type="text" placeholder="<?php echo $item["repartidor"] ?>" name="repaT"></p>
                                                                    <p>Producto: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="productoT">
                                                                            <?php foreach ($mostarP as $item) : ?>
                                                                                <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["nombre_producto"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p>
                                                                    <p>Proveedor: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="TiendaP">
                                                                            <?php foreach ($mostrarT as $item) : ?>
                                                                                <option value="<?php echo $item["id_tienda"] ?>"><?php echo $item["nombre"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p><input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Proveedores Registrados
                        </div>
                        <div class="card-body">
                            <table id="DTProveedores">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Proveedor</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrarProve as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_proveedor"]  ?></td>
                                            <td><?php echo  $item["nombre_proveedor"] ?></td>
                                            <td><?php echo  $item["telefono"] ?></td>
                                            <td><?php echo  $item["correo"]  ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-proveedor="<?php echo $item['id_proveedor']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_proveedor']; ?>d"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_proveedor']; ?>d" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Proveedor</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroProveedor.php">
                                                                    <p>Proveedor a Editar: <select name="idProv">

                                                                            <option value="<?php echo $item["id_proveedor"] ?>"><?php echo $item["id_proveedor"] ?></option>

                                                                        </select></p>
                                                                    <p>Nombre del proveedor: <input type="text" placeholder="<?php echo $item["nombre_proveedor"] ?>" name="nombreProv"></p>
                                                                    <p>Telefono: <input type="text" placeholder="<?php echo $item["telefono"] ?>" name="telefonoProv"></p>
                                                                    <p>Correro: <input type="text" placeholder="<?php echo $item["correo"] ?>" name="correoProv"></p>
                                                                    <input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tiendas Registradas
                        </div>
                        <div class="card-body">
                            <table id="DTTiendas">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrarT as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_tienda"] ?></td>
                                            <td><?php echo  $item["nombre"] ?></td>
                                            <td><?php echo  $item["direccion"] ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-tienda="<?php echo $item['id_tienda']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_tienda']; ?>s"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_tienda']; ?>s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Tienda</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroTienda.php">
                                                                    <p>Tienda a Editar: <select name="idTi">

                                                                            <option value="<?php echo $item["id_tienda"] ?>"><?php echo $item["id_tienda"] ?></option>

                                                                        </select></p>
                                                                    <p>Nombre de la tienda: <input type="text" placeholder="<?php echo $item["nombre"] ?>" name="nombreT"></p>
                                                                    <p>Direccion: <input type="text" placeholder="<?php echo $item["direccion"] ?>" name="direccionT"></p>
                                                                    <input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>

                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Ventas
                        </div>
                        <div class="card-body">
                            <table id="DTVenta">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cantidad Comprada</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($mostrarV as $item) : ?>
                                        <tr>
                                            <td><?php echo $item["id_venta"]  ?></td>
                                            <td><?php echo  $item["cant_venta"] ?></td>
                                            <td><?php echo  $item["fecha"] ?></td>
                                            <td><?php echo  $item["id_cliente"]  ?></td>
                                            <td><?php echo $item["id_producto"] ?></td>
                                            <td>
                                                <button class="btn btn-danger btn-eliminar" data-id-venta="<?php echo $item['id_venta']; ?>">Eliminar</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $item['id_venta']; ?>x"> Editar
                                                </button>


                                                <div class="modal fade" id="exampleModal_<?php echo $item['id_venta']; ?>x" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Venta</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="./classes/registroVenta.php">
                                                                    <p>Venta a Editar: <select name="idV">

                                                                            <option value="<?php echo $item["id_venta"] ?>"><?php echo $item["id_venta"] ?></option>

                                                                        </select></p>
                                                                    <p>Cantidad vendida: <input type="text" placeholder="<?php echo $item["cant_venta"] ?>" name="cantV"></p>
                                                                    <p>Fecha: <input type="date" placeholder="<?php echo $item["fecha"] ?>" name="fechaV"></p>
                                                                    
                                                                    <p>Cliente: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="clienteV">
                                                                            <?php foreach ($mostrarC as $item) : ?>
                                                                                <option value="<?php echo $item["id_cliente"] ?>"><?php echo $item["id_cliente"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                
                                                                    <p>Producto: <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="productoV">
                                                                            <?php foreach ($mostarP as $item) : ?>
                                                                                <option value="<?php echo $item["id_producto"] ?>"><?php echo $item["nombre_producto"] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select></p>
                                                                    <p><input type="submit" class="btn btn-primary btn-block" value="Enviar"></p>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
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
    </script>
    <script>


    </script>
    <script src="./JS/eliminarCliente.js"></script>
    <script src="JS/OcultarBarra.js"></script>
    <script src="./JS/eliminarAdmion.js"></script>
    <script src="./JS/eliminarProducto.js"></script>
    <script src="./JS/eliminarCompra.js"></script>
    <script src="./JS/eliminarProductoEnTienda.js"></script>
    <script src="./JS/eliminarProveedor.js"></script>
    <script src="./JS/eliminarTienda.js"></script>
    <script src="./JS/eliminarVenta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
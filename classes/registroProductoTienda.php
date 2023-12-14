<?php
require_once "productoEnTienda.php";
require_once "producto.php";
$idPTienda = $_POST["idPt"];
$cantExist = Producto::mostrar();
$cantPorTienda = $_POST["cantPorT"];
$fechat = $_POST["fechaT"];
$repat = $_POST["repaT"];
$productoEnTienda = $_POST["productoT"];
$Tienda = $_POST["TiendaP"];
foreach ($cantExist as $cant) {
    if ($cant["id_producto"] == $productoEnTienda) {
        $producto = new Producto();
        $producto->setId($productoEnTienda);
        $producto->actualizarExist($cant["cant_existente"] -  $cantPorTienda);
    }
}

$admin = new ProductoEnTienda($cantPorTienda,$fechat, $repat, $productoEnTienda,$Tienda, $idPTienda);
$admin->guardar();



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>404 Error - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <p class="lead"><?php echo "Se han registrado " . $cantPorTienda . " unidades del producto ".$productoEnTienda. " En la tienda ".$Tienda . " por el repartidor ". $repat ?></p>
                                    <a href="../Formularios.php">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Volver a formularios
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
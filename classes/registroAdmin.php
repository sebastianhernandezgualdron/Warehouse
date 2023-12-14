<?php
require_once "administrador.php";
$mostrar = Admin::mostrar();

$idAdmin = $_POST["idA"];

echo $idAdmin;
$nombreAdmin = $_POST["nomnreA"];
$cargoAdmin = $_POST["cargoA"];
$usuarioAdmin = $_POST["usuarioA"];
$contraseñaAdmin = $_POST["contraseñaA"];
$tiendaAdmin = $_POST["tiendaA"];
$validar = Admin::ValidarUsuario($usuarioAdmin);



?>

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
                                <p class="lead"><?php if ($validar && $idAdmin!=$validar["id_admin"]) {
                                                    echo "El usuario ya está en uso";
                                                } else {
                                                    $admin = new Admin($idAdmin, $nombreAdmin, $cargoAdmin, $usuarioAdmin, $contraseñaAdmin, $tiendaAdmin);

                                                    $admin->guardar();


                                                    echo "Se ha guardado correctamente " . $nombreAdmin . " con el id: " . $idAdmin;
                                                }  ?></p>
                                <a href="../tienda.php">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Ir a tienda
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
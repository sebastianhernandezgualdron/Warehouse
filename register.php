<?php
session_start();
require_once "./classes/tienda.php";

$tiendaId = Tienda::mostrar();


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear Admin</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="./classes/registroAdmin.php">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                                <input name="idA" type="text" class="form-control" placeholder="Identificacion" aria-label="ID" aria-describedby="basic-addon1">
                                              </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input name="nomnreA" type="text" class="form-control" placeholder="Nombre" aria-label="Name" aria-describedby="basic-addon1">
                                              </div>
                                              <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Cargo</label>
                                                <select name="cargoA" class="form-select" id="inputGroupSelect01">
                                                    <option value="Manager">Manager</option>
                                                    <option value="Security supervisor">Supervisor de Seguridad y Sanidad</option>
                                                    <option value="Cashier">Cajero</option>
                                                </select>
                                                </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input name="usuarioA" type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                                              </div>
                                              <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input name="contraseñaA" class="form-control" type="password" id="floatingPassword" placeholder="Contraseña">
                                                        
                                                </div>
                                            <div class="form-floating">
                                              <select name="tiendaA" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                <?php foreach($tiendaId as $item):?>
                                                    <option value="<?php echo $item["id_tienda"]?>"><?php echo $item["nombre"]?></option>
                                                    <?php endforeach ?>

                                                    
                                                </select>
                                                <label for="floatingSelect">Seleccione su tienda</label>
                                                </div>
                                         

                                              
                                        
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" href="login.html" type="submit" value="Create Account"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
       
        
    </body>
</html>

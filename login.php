<?php  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Inicio de sesión tablero de administración</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Inicio de sesión</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="validarLoginEmpresa.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputCorreo" name="Correo" type="text"
                                                placeholder="Correo Electronico" / required>
                                            <label for="inputCorreo">Correo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="Password"
                                                type="password" placeholder="Crear contraseña" / required>
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div align="center"
                                            class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!--<a class="small" href="password.php">Olvidé mi contraseña</a>-->
                                            <button class="d-grid btn btn-primary btn-block" type="submit">Iniciar
                                                sesión</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a>
                                            <h6>¿No tienes una cuenta?</h6>
                                        </a><br>
                                        <a href="register.php">
                                            <h6>¡Regístrate!</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
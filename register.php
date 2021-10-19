<?php  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registro</title>
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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear cuenta</h3>
                                </div>
                                <div align="center" class="card-body">
                                    <form method="POST" action="register_service.php">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input class="form-control" id="inputNombre" name="Nombre"
                                                        type="text" placeholder="Nombre de usario" / required>
                                                    <label for="inputNombre">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-3">
                                                    <input class="form-control" id="inputCorreo" name="Correo"
                                                        type="text" placeholder="Correo Electronico" / required>
                                                    <label for="inputCorreo">Correo</label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="Password"
                                                            type="password" placeholder="Create a password" / required>
                                                        <label for="inputPassword">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm"
                                                            name="PasswordConfirm" type="password"
                                                            placeholder="Confirm password" / required>
                                                        <label for="inputPasswordConfirm">Confirmar contraseña</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" class="mt-4 mb-0">
                                                <button type="submit" class="d-grid btn btn-primary btn-block">Crear
                                                    cuenta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <a><h6>¿Ya tienes una cuenta?</h6></a><br>
                                        <a href="login.php"><h6>¡Inicia sesión!</h6></a>
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
<?php
session_start();
if (!isset($_SESSION['AutenticarUsuario'])) {
    header("location: Inicio.php?status=500");
} else {
    $id_usuario = $_SESSION['Id_Usuario'];
    $correo = $_SESSION['Correo'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tablero de administración</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/salidasOpciones.js"></script>
</head>

<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">Panel de Administración</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="login.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Opciones</div>
                        <a class="nav-link" href="info_gral.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>Información general
                        </a>
                        <a class="nav-link" href="info_ofertas_promo.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>Ofertas y Promociones
                        </a>
                        <a class="nav-link" href="InfoProducService.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-pizza-slice"></i></div>Productos y Servicios
                        </a>
                        <a class="nav-link" href="users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>Usuarios
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <p>
                <div class="card">
                    <div class="card-header text-center">
                        <h1>
                            <div class="mt-4">Registrar datos de la empresa</div>
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="alta.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 text-center">
                                <label for="Imagen">Elige un archivo de imagen</label>
                                <input type="file" class="form-control-file" name="Imagen"
                                    accept="image/gif, image/jpeg, image/jpg, image/png" /><br>
                            </div>
                            <div class="mb-3">
                                <!--<label for="Id_Usuario" class="form-label">Usuario</label>-->
                                <input type="hidden" class="form-control" name="Id_Usuario" id="Id_Usuario"
                                    value="<?php echo $id_usuario; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Id_Categoria" class="form-label">Seleccione una categoría</label>
                                <select class="form-select" aria-label="categorias" name="Id_Categoria" id="categorias"
                                    required>

                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="Id_Direccion" class="form-label">Dirección</label>
                                <select class="form-select" aria-label="direcciones" name="Id_Direccion"
                                    id="direcciones" required>

                                </select>
                            </div>
                            <div class="mb-3 ">
                                <label for="Nombre" class="form-label">Nombre de la empresa</label>
                                <input type="text" class="form-control" name="Nombre"
                                    placeholder="Ingrese el nombre de su empresa" id="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Número telefónico</label>
                                <input type="tel" class="form-control" name="Telefono"
                                    placeholder="Ingrese su número telefónico" id="Telefono" pattern="[0-9]{10}"
                                    required title="10 Dígitos">
                            </div>
                            <div class="mb-3">
                                <!--<label for="correo" class="form-label">Correo electrónico</label>-->
                                <input type="hidden" class="form-control" name="Correo" id="correo"
                                    value="<?php echo $correo; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="H_Open" class="form-label">Horario de apertura</label>
                                <input type="time" class="form-control" name="H_Open" id="H_Open">
                            </div>
                            <div class="mb-3">
                                <label for="H_Close" class="form-label">Horario de cierre</label>
                                <input type="time" class="form-control" name="H_Close" id="H_Close">
                            </div>
                            <!--<div class="mb-3">
                                <label for="Fecha_Crea" class="form-label">Fecha de creación</label>
                                <input type="date" class="form-control" name="Fecha_Crea"
                                    placeholder="Ingrese fecha de creación de la empresa" id="Fecha_Crea" required>
                            </div>-->
                            <div class="mb-3">
                                <label for="Descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="Descripcion"
                                    placeholder="Ingrese una breve descripción de la empresa" id="Descripcion" required>
                            </div>
                            <div class="mb-3">
                                <label for="pageFb" class="form-label">Página de Facebook</label>
                                <input type="text" class="form-control" name="Pagina_FB"
                                    placeholder="Ingrese el link a su página de FB" id="PageFb" required>
                                <input type="hidden" name="Activo" value="1">
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="js/scripts.js"></script>

</body>

</html>
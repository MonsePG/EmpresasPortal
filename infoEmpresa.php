<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tablero de administración</title>
    <script src="lib/jquery/jquery-3.5.1.slim.min.js"></script>
    <script src="lib/dist/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/salidaInfoEmpresa.js"></script>
    <link rel="stylesheet" href="lib/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css" >
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="#">Panel de Administración</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                            <div class="mt-4">Información general</div>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="editEmpresa.php" method="post" enctype="multipart/form-data">
                                    <div class="ImgEmp">

                                    </div>
                                
                                <div class="Empresa">

                                </div>
                                <!--<button type="submit" class="btn btn-success"> Actualizar </button>-->
                            </form>
                        </div>
                    </div>
                    <!--<form action="getInfoEmpresa.php" method="GET" enctype="multipart/form-data">
                        <div class="mb-3" align="center">
                            <label for="Imagen">Elije un archivo de imagen</label>
                            <input type="file" class="form-control-file" value="<?php //echo $Nombre?> name=" Imagen" accept="image/gif, image/jpeg" /><br>
                        </div>
                        <div class="mb-3 ">
                            <label for="Nombre" class="form-label">Nombre de la empresa</label>
                            <input type="text" class="form-control" name="Nombre" placeholder="Ingrese el nombre de su empresa" id="Nombre" value="<?php //echo $Nombre?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Número telefónico</label>
                            <input type="tel" class="form-control" name="Telefono" placeholder="Ingrese su número telefónico" id="Telefono" pattern="[0-9]{10}" required title="10 Dígitos" value="<?php //echo $Telefono?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="Correo" size="30" placeholder="Ingrese su correo electrónico de contacto" id="Correo" value="" <?php //echo $Correo?>" disabled>
                        </div>
                        <div class=" mb-3">
                            <label for="H_Open" class="form-label">Horario de apertura</label>
                            <input type="time" class="form-control" name="H_Open" id="H_Open" value="<?php //echo $HoraInicio?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="H_Close" class="form-label">Horario de cierre</label>
                            <input type="time" class="form-control" name="H_Close" id="H_Close" value="<?php //echo $HoraFin?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="Descripcion" placeholder="Ingrese una breve descripción de la empresa" id="Descripcion" value="<?php //echo $Descripcion?>" disabled>
                        </div>
                        <div align="center"><button type="submit" class="btn btn-success">Guardar</button></div>
                    </form>-->
                </div>
            </div>
        </div>
    </div>

    <script src="lib/dist/js/bootstrap.js"></script>
    <script src="lib/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="js/scripts.js"></script>

</body>

</html>
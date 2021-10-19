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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
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
                <center>
                    <h1 class="mt-4">Productos y Servicios</h1>
                </center>

                <?php
    $id_empresa = $_SESSION['Id_Empresa'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://web-api-ps.herokuapp.com/api/v1/Productos/consultaProductServiceCard/'.$id_empresa);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($data);
    foreach ($json->msg as $item)
    {
        ?>
                <div class="card-group">
                    <div class="container" id="mycontainer">
                        <!--<div id=" mycontainer" class="container">-->
                        <div class="card text-center">
                            <img src="<?php echo $item->Imagen;?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php    echo "$item->Nombre" ; ?>
                                </h5>
                                <p class="card-text"><b>Tipo</b>
                                    <?php    echo "$item->TipoPS" ; ?>
                                </p>
                                <p class="card-text"><b>Precio</b>
                                    <?php    echo "$item->Precio" ; ?>
                                </p>
                                <p class="card-text"><b>Status</b>
                                    <?php    echo "$item->Activo" ; ?>
                                </p>
                                <form action="view_productService.php" method="post">
                                    <input type="hidden" name="Id_PS" value="<?php echo $item->Id_PS; ?>">
                                    <button type="submit" class="btn btn-outline-dark">Más información
                                    </button>
                                </form><br>
                                <form action="edit_productService.php" method="post">
                                    <input type="hidden" name="Id_PS" value="<?php echo $item->Id_PS; ?>">
                                    <button type="submit" class="btn btn-outline-dark">Editar
                                    </button>
                                </form><br>
                                <form action="bajaProductService.php" method="post">
                                    <input type="hidden" name="producto_id" value="<?php echo $item->Id_PS; ?>">
                                    <button type="submit" class="btn btn-outline-dark">Desactivar
                                    </button>
                                </form><br>
                                <form action="reactivacionProductService.php" method="post">
                                    <input type="hidden" name="producto_id" value="<?php echo $item->Id_PS; ?>">
                                    <button type="submit" class="btn btn-outline-dark">Activar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
    }
?>
                <div align="center">
                    <a class="btn btn-outline-primary" href="addProductService.php" role="button">Crear nuevo</a>
                </div>

                <div id="layoutSidenav_content">
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small"></div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="js/scripts.js"></script>
</body>

</html>
<?php
session_start();
$id_empresa = $_SESSION['Id_Empresa'];
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
                <p>
                <div class="card">
                    <div align='center' class="card-header">
                        <h1>
                            <div align='center' class="mt-4">Crear nuevo producto o servicio</div>
                        </h1>
                    </div>
                    <div class="card-body">
                        <!--<div align='center'><img src="add.png" width="80" height="80"></div>-->
                        <form action="altaPS.php" method="POST" enctype="multipart/form-data">
                            <div class="card-header" align="center">Elija si desea crear un producto o un servicio
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col" align="center">
                                            <div class="form-check form-check-inline" align="center">
                                                <input class="form-check-input" type="radio" name="TipoPS" value="P"
                                                    id="TipoPS" checked>
                                                <label class="form-check-label" for="TipoPS">Producto</label>
                                            </div>
                                        </div>
                                        <div class="col" align="center">
                                            <div class="form-check form-check-inline" align="center">
                                                <input class="form-check-input" type="radio" name="TipoPS" value="S"
                                                    id="TipoPS" checked>
                                                <label class="form-check-label" for="TipoPS">Servicio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="Id_Categoria" class="form-label">Categoría</label>
                                    <select class="form-select" aria-label="Default select example" name="Id_Categoria"
                                        id="Id_Categoria" required>
                                        <option value="1">Calzado</option>
                                        <option value="2">Vinos y licores</option>
                                        <option value="3">Artículos de cómputo</option>
                                        <option value="4">Paletas y helados</option>
                                        <option value="5">Comercios de pintura</option>
                                        <option value="21">Carnicerías</option>
                                        <option value="22">Cafeterías</option>
                                        <option value="23">Ferreterías</option>
                                        <option value="24">Tintorerías</option>
                                        <option value="25">Taquerías</option>
                                    </select>
                                </div>
                                <div class="mb-3"> <label for="Id_Empresa" class="form-label">Empresa</label>
                                    <input type="number" class="form-control" name="Id_Empresa" id="Id_Empresa"
                                        value="<?php echo $id_empresa; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre del producto/servicio</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre"
                                        placeholder="Asigne un nombre al producto/servicio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Marca" class="form-label">Marca</label>
                                    <input type="text" class="form-control" name="Marca" id="Marca"
                                        placeholder="Asigne una marca" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" name="Precio" id="Precio"
                                        placeholder="Asigne un precio al producto/servicio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" name="Descripcion" id="Descripcion"
                                        placeholder="Asigne una descripción al producto/servicio" required>
                                </div>
                                <div class="mb-3" align="center">
                                    <label for="Imagen">Elije un archivo de imagen</label>
                                    <input type="file" class="form-control-file" name="Imagen"
                                        accept="image/gif, image/jpeg" /><br>
                                </div>
                                <!--<div class="mb-3">
                                    <label for="Activo" class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="Activo"
                                        id="Activo" required>
                                        <option value="1">Activo</option>
                                    </select>
                                </div>-->
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success">Guardar</button>
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
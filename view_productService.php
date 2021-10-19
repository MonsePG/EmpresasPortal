<?php
session_start();

$Id = $_SESSION['Id_Empresa'];
$Id_PS = $_POST['Id_PS'];
$campos = array('Id_PS' => $Id_PS);
$campos_string = http_build_query($campos);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http:///web-api-ps.herokuapp.com/api/v1/Productos/consultaProductoServicio/' . $Id);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $campos_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
$decodificada = json_decode($data);
$TipoPS = $decodificada->msg->TipoPS;
$Nombre = $decodificada->msg->NombrePS;
$Marca = $decodificada->msg->Marca;
$Precio = $decodificada->msg->Precio;
$Categoria = $decodificada->msg->Categoria;
$Descripcion = $decodificada->msg->Descripcion;
$Imagen = $decodificada->msg->ImagenPS;
$Activo = $decodificada->msg->Activo;
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
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
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
            <main>
                <div class="container-fluid px-4">
                    <center>
                        <h1 class="mt-4">Información del producto/servicio</h1>
                    </center>
                    <div class="mb-3">
                        <div class="center">
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?php echo $Imagen; ?>" class="card-img-top">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    Elija si desea crear un producto o servicio
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                if ($TipoPS == 'P') {
                                                ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                        disabled checked>
                                                    <label class="form-check-label" for="inlineRadio1">Producto</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2"
                                                        disabled>
                                                    <label class="form-check-label" for="inlineRadio2">Servicio</label>
                                                </div>
                                                <?php
                                                } else {
                                                ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                        disabled>
                                                    <label class="form-check-label" for="inlineRadio1">Producto</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2"
                                                        disabled checked>
                                                    <label class="form-check-label" for="inlineRadio2">Servicio</label>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Nombre del
                                            producto/servicio</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Asigne un nombre a la oferta/promoción"
                                            value="<?php echo $Nombre ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Marca</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Asigne un nombre a la oferta/promoción"
                                            value="<?php echo $Marca ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Precio</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Asigne un nombre a la oferta/promoción"
                                            value="<?php echo $Precio ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Categoría</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Asigne un nombre a la oferta/promoción"
                                            value="<?php echo $Categoria ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Descripción</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"
                                            placeholder="Asigne un nombre a la oferta/promoción"
                                            value="<?php echo $Descripcion ?>" disabled>
                                    </div>
                                    <label for="formGroupExampleInput2" class="form-label">Activo</label>
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <?php if ($Activo == 1) {
                                        ?>
                                        <option value="">Activo</option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="">Inactivo</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!--<div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Asigne un nombre a la oferta/promoción"
                                        value="<?php echo $TipoPS ?>" disabled>
                                </div>-->
                                </div>
                            </div>
                        </div>
                        <div align="center" style="width:100%; height:100%">
                            <a class="btn btn-outline-primary" href="infoProducService.php" role="button">Regresar</a>
                        </div>
                    </div>
            </main>
        </div>
    </div>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <!--<div class="text-muted">Copyright &copy; Website 2021</div>-->
                <div>

                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
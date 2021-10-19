<?php
session_start();

$Id = $_SESSION['Id_Empresa'];
$Id_Oferta = $_POST["id_Oferta"];
$campos = array('Id_Oferta' => $Id_Oferta);
$campos_string = http_build_query($campos);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http:///web-api-ps.herokuapp.com/api/v1/oferta_promo/consultaPromoOferta/' . $Id);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $campos_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
$decodificada = json_decode($data);
$Tipo = $decodificada->msg->Tipo;
$Objetivo = $decodificada->msg->Objetivo;
$Nombre = $decodificada->msg->NombreOP;
$crearFI = date_create($decodificada->msg->FechaInicio);
$FechaInicio = date_format($crearFI, 'Y-m-d');
$crearHI = date_create($decodificada->msg->Hora_inicio);
$HoraInicio = date_format($crearHI, 'H:i');
$crearFF = date_create($decodificada->msg->FechaFin);
$FechaFin = date_format($crearFF, 'Y-m-d');
$crearHF = date_create($decodificada->msg->Hora_Fin);
$HoraFin = date_format($crearHF, 'H:i');
$Ciudad = $decodificada->msg->Ciudad;
$EdadI = $decodificada->msg->EdadInicio;
$EdadF = $decodificada->msg->EdadFin;
$Sexo = $decodificada->msg->SEXO;
$Activo = $decodificada->msg->Activo;
$Imagen = $decodificada->msg->ImagenOP;
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
                        <h1 class="mt-4">Información de la oferta/promoción</h1>
                    </center>
                    <div class="mb-3">
                        <center>
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
                                    Elija si desea crear una oferta o una promoción
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                if ($Tipo == 'O') {
                                                ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                        disabled checked>
                                                    <label class="form-check-label" for="inlineRadio1">Oferta</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2"
                                                        disabled>
                                                    <label class="form-check-label" for="inlineRadio2">Promoción</label>
                                                </div>
                                                <?php
                                                } else {
                                                ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1"
                                                        disabled>
                                                    <label class="form-check-label" for="inlineRadio1">Oferta</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2"
                                                        disabled checked>
                                                    <label class="form-check-label" for="inlineRadio2">Promoción</label>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </center><br>
                        <center>
                            <div class="card">
                                <div class="card-header">
                                    Elija el objetivo de la oferta/promoción
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            if ($Objetivo == 'R') {
                                            ?>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="reconocimiento"
                                                        name="oferta" value="reconocimiento" disabled checked>
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="alcance"
                                                        name="oferta" value="alcance" disabled>
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="interaccion"
                                                        name="oferta" value="interaccion" disabled>
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            } else if ($Objetivo == 'A') {
                                            ?>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="reconocimiento"
                                                        name="oferta" value="reconocimiento" disabled>
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="alcance"
                                                        name="oferta" value="alcance" disabled checked>
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="interaccion"
                                                        name="oferta" value="interaccion" disabled>
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            } else {
                                            ?>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="reconocimiento"
                                                        name="oferta" value="reconocimiento" disabled>
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="alcance"
                                                        name="oferta" value="alcance" disabled>
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" id="interaccion"
                                                        name="oferta" value="interaccion" disabled checked>
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center><br>
                        <div class="card">
                            <center>
                                <div class="card-header">
                                    Información general
                                </div>
                            </center>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Nombre de la
                                        oferta/promoción</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Asigne un nombre a la oferta/promoción"
                                        value="<?php echo $Nombre ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Fecha de inicio</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput2"
                                        value="<?php echo $FechaInicio; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Hora inicio</label>
                                    <input type="time" class="form-control" id="formGroupExampleInput2"
                                        value="<?php echo $HoraInicio; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Fecha de vencimiento</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput2"
                                        value="<?php echo $FechaFin; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Hora finalización</label>
                                    <input type="time" class="form-control" id="formGroupExampleInput2"
                                        value="<?php echo $HoraFin; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Público
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Ciudad</label>
                                    <select class="form-select" aria-label="Lugares" disabled>
                                        <option value=""><?php echo $Ciudad; ?></option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Edad</label><br>
                                    <label for="formGroupExampleInput2" class="form-label">Desde:</label>
                                    <select class="form-select" aria-label="edad" disabled>
                                        <option value="<?php echo $EdadI; ?>" selected><?php echo $EdadI; ?> años
                                        </option>
                                    </select>
                                    <label for="formGroupExampleInput2" class="form-label">Hasta:</label>
                                    <select class="form-select" aria-label="edad" disabled>
                                        <option value="<?php echo $EdadF; ?>" selected><?php echo $EdadF; ?> años
                                        </option>
                                    </select>
                                </div>
                                <label for="formGroupExampleInput2" class="form-label">Sexo</label>
                                <select class="form-select" aria-label="Default select example" disabled>
                                    <option value="<?php echo $Sexo ?>" selected><?php echo $Sexo ?></option>
                                </select><br>
                            </div>
                            <div class="card">
                                <center>
                                    <div class="card-header">
                                        Identidad
                                    </div>
                                </center>
                                <div class="card-body">
                                    <!--<label for="formGroupExampleInput2" class="form-label">Página de Facebook</label>
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option value=""><?php echo $PaginaFB; ?></option>
                                    </select><br>-->
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
                                </div>
                                <div align="center" style="width:100%; height:100%">
                                    <a class="btn btn-outline-primary" href="info_ofertas_promo.php"
                                        role="button">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
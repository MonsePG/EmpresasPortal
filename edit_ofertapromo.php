<?php
session_start();

$Id = $_SESSION['Id_Empresa'];
$Id_Oferta = $_POST['id_Oferta'];
$campos = array('Id_Oferta' => $Id_Oferta);
$campos_string = http_build_query($campos);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://web-api-ps.herokuapp.com/api/v1/oferta_promo/consultaPromoOferta/' . $Id);
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
$Id_Empresa =$decodificada->msg->Id_Empresa;
$Id_Categoria = $decodificada->msg->Id_Categoria;
$Id_Subcategoria = $decodificada->msg->Id_Subcategoria;
$Id_PS = $decodificada->msg->Id_PS;
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
                        <h1 class="mt-4">Editar información de la oferta/promoción</h1>
                    </center>
                    <div class="mb-3">
                        <!--<form action="update_image.php" method="POST" enctype="multipart/form-data">
                            <div id="layoutSidenav_content">
                                <div class="container-fluid px-4">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            Actualizar imagen
                                            <img src="upload_image.png" width="30" height="40"><br>
                                        </div><br>
                                        <div class="container">
                                            <div class="row justify-content-md-center">
                                                <div class="card" style="width: 18rem;">
                                                    <img src="<?php echo $Imagen; ?>" class="card-img-top">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div align="center">
                                            <input type="file" name="ImagenOP"
                                                accept="image/png, .jpeg, .jpg, image/gif">
                                        </div><br>
                                        <div align="center">
                                            <div style="width:100%; height:100%">
                                                <div align="center">
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                    <p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>-->

                        <form action="editOP.php" method="POST" enctype="multipart/form-data">
                            <div align="center" class="card">
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
                                                    <input class="form-check-input" type="radio" name="TipoOP"
                                                        id="inlineRadio1" value="O" checked>
                                                    <label class="form-check-label" for="inlineRadio1">Oferta</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="inlineRadio2"
                                                        value="P" name="TipoOP">
                                                    <label class="form-check-label" for="inlineRadio2">Promoción</label>
                                                </div>
                                                <?php
                                                } else {
                                                ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="TipoOP"
                                                        id="inlineRadio2" value="P" checked>
                                                    <label class="form-check-label" for="inlineRadio2">Promoción</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="inlineRadio1"
                                                        value="O" name="TipoOP">
                                                    <label class="form-check-label" for="inlineRadio1">Oferta</label>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div align="center" class="card">
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
                                                        name="Objetivo" value="R" checked>
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más
                                                probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="alcance" value="A">
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de
                                                personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="interaccion" value="I">
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o
                                                reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            } else if ($Objetivo == 'A') {
                                            ?>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="reconocimiento" value="R">
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más
                                                probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="alcance" name="Objetivo" value="A" checked>
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de
                                                personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="interaccion" value="I">
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o
                                                reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            } else {
                                            ?>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="reconocimiento" value="R">
                                                    <label for="reconocimiento">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más
                                                probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="alcance" value="A">
                                                    <label for="alcance">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de
                                                personas.
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <input type="radio" class="form-check-input" name="Objetivo"
                                                        id="interaccion" name="Objetivo" value="I" checked>
                                                    <label for="interaccion">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o
                                                reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="card">
                                <div align="center" class="card-header">Información general</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="hidden" value="<?php echo $Id_Oferta; ?>" name="IdOFerta">
                                        <input type="hidden" value="<?php echo $Id_Empresa; ?>" name="Id_Empresa">
                                        <input type="hidden" value="<?php echo $Id_Categoria; ?>" name="Id_Categoria">
                                        <input type="hidden" value="<?php echo $Id_Subcategoria; ?>"
                                            name="Id_Subcategoria">
                                        <input type="hidden" value="<?php echo $Id_PS; ?>" name="Id_PS">

                                        <label for="formGroupExampleInput2" class="form-label">Nombre de la
                                            oferta/promoción</label>
                                        <input type="text" class="form-control" name="OferPromo"
                                            id="formGroupExampleInput2" value="<?php echo $Nombre ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Fecha de inicio</label>
                                        <input type="date" class="form-control" name="FechaInicio"
                                            id="formGroupExampleInput2" value="<?php echo $FechaInicio; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Hora inicio</label>
                                        <input type="time" class="form-control" name="Hora_inicio"
                                            id="formGroupExampleInput2" value="<?php echo $HoraInicio; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Fecha de
                                            vencimiento</label>
                                        <input type="date" class="form-control" name="FechaFin"
                                            id="formGroupExampleInput2" value="<?php echo $FechaFin; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Hora finalización</label>
                                        <input type="time" class="form-control" name="Hora_fin"
                                            id="formGroupExampleInput2" value="<?php echo $HoraFin; ?>">
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
                                        <select class="form-select" name="Cd" aria-label="Lugares">
                                            <option value="<?php echo $Ciudad; ?>"><?php echo $Ciudad; ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Edad</label><br>
                                        <label for="formGroupExampleInput2" class="form-label">Desde:</label>
                                        <select class="form-select" name="EdadInicio" aria-label="edad">
                                            <option value="<?php echo $EdadI; ?>" selected>
                                                <?php echo $EdadI; ?> años
                                            </option>
                                        </select>
                                        <label for="formGroupExampleInput2" class="form-label">Hasta:</label>
                                        <select class="form-select" name="EdadFin" aria-label="edad">
                                            <option value="<?php echo $EdadF; ?>" selected>
                                                <?php echo $EdadF; ?> años
                                            </option>

                                        </select>
                                    </div>
                                    <label for="formGroupExampleInput2" class="form-label">Sexo</label>
                                    <select class="form-select" name="SEXO" aria-label="Default select example">
                                        <option value="<?php echo $Sexo ?>" selected><?php echo $Sexo ?>
                                        </option>
                                    </select><br>
                                </div>
                                <div class="card">
                                    <div align="center" class="card-header">Identidad</div>
                                    <div class="card-body">
                                        <label for="formGroupExampleInput2" class="form-label">Activo</label>
                                        <select class="form-select" name="Activo">
                                            <?php if ($Activo == 1) {
                                        ?>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                            <?php
                                        } else {
                                        ?>
                                            <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div style="width:100%; height:100%">
                                        <div align="center"><button type="submit"
                                                class="btn btn-success">Guardar</button>
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutSidenav_content">
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
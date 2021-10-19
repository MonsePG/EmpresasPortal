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
                    aria-expanded="false"><i class="fas fa-smile"></i></a>
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
                            <div align='center' class="mt-4">Crear nueva oferta o promoción</div>
                        </h1>
                    </div>
                    <div class="card-body">
                        <!--<div align='center'><img src="add.png" width="80" height="80"></div>-->
                        <form action="altaOP.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <div class="mb-3"> <label for="Id_Empresa" class="form-label">Empresa</label>
                                    <input type="number" class="form-control" name="Id_Empresa" id="Id_Empresa"
                                        value="<?php echo $id_empresa; ?>" required>
                                </div>
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
                                <div class="mb-3">
                                    <label for="Id_Subcategoria" class="form-label">Subcategoría</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="Id_Subcategoria" id="Id_Subcategoria" required>
                                        <option value="1">Marisqueria</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Id_PS" class="form-label">Producto o servicio</label>
                                    <select class="form-select" aria-label="Default select example" name="Id_PS"
                                        id="Id_PS" required>
                                        <option value="1">Caja alitas</option>
                                        <option value="2">Café latte grande</option>
                                        <option value="3">Capuchino vainilla</option>
                                        <option value="4">Frappé sencillo</option>
                                        <option value="5">Frappé con paleta</option>
                                        <option value="6">Beacon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-header" align="center">Elija si desea crear una oferta o una promoción
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col" align="center">
                                            <div class="form-check form-check-inline" align="center">
                                                <input class="form-check-input" type="radio" name="TipoOP" value="O"
                                                    id="TipoOP" checked>
                                                <label class="form-check-label" for="TipoOP">Oferta</label>
                                            </div>
                                        </div>
                                        <div class="col" align="center">
                                            <div class="form-check form-check-inline" align="center">
                                                <input class="form-check-input" type="radio" name="TipoOP" value="P"
                                                    id="TipoOP" checked>
                                                <label class="form-check-label" for="TipoOP">Promoción</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <div class="card-header" align="center">Elija el objetivo de la oferta/promoción</div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col" align="center">
                                                <div align="center">
                                                    <input type="radio" name="Objetivo" value="Reconocimiento"
                                                        id="Objetivo" checked>
                                                    <label for="Objetivo">Reconocimiento de marca</label>
                                                </div>
                                                Muestra tus ofertas/promociones a las personas con más
                                                probabilidades de
                                                recordarlos
                                            </div>
                                            <div class="col" align="center">
                                                <div align="center">
                                                    <input type="radio" name="Objetivo" value="Alcance" id="Objetivo"
                                                        checked>
                                                    <label for="Objetivo">Alcance</label>
                                                </div>
                                                Muestra tus ofertas/promociones a la mayor cantidad posible de
                                                personas.
                                            </div>
                                            <div class="col" align="center">
                                                <div align="center">
                                                    <input type="radio" name="Objetivo" value="Interacción"
                                                        id="Objetivo" checked>
                                                    <label for="Objetivo">Interacción</label>
                                                </div>
                                                Consigue que más personas indiquen que les gusta tu página o
                                                reaccionen
                                                a
                                                tus ofertas/promociones, las comenten o las compartan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div align="center" class="card-header">Información general</div>
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre de la
                                        oferta/promoción</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre"
                                        placeholder="Asigne un nombre a la oferta/promoción">
                                </div>
                                <div class="mb-3">
                                    <label for="FechaInicio" class="form-label">Fecha de inicio</label>
                                    <input type="date" class="form-control" name="FechaInicio" id="FechaInicio">
                                </div>
                                <div class="mb-3">
                                    <label for="Hora_inicio" class="form-label">Hora inicio</label>
                                    <input type="time" class="form-control" name="Hora_inicio" id="Hora_inicio">
                                </div>
                                <div class="mb-3">
                                    <label for="FechaFin" class="form-label">Fecha de
                                        vencimiento</label>
                                    <input type="date" class="form-control" name="FechaFin" id="FechaFin">
                                </div>
                                <div class="mb-3">
                                    <label for="Hora_fin" class="form-label">Hora finalización</label>
                                    <input type="time" class="form-control" name="Hora_fin" id="Hora_fin">
                                </div>
                                <div class="mb-3">
                                    <div align="center" class="card-header">Público</div>
                                    <div align="center"><label for="Público" class="form-label">Define
                                            quién
                                            quieres que
                                            vea
                                            tus ofertas/promociones</label></div>
                                    <div class="mb-3">
                                        <label for="Ciudad" class="form-label">Ciudad</label>
                                        <select class="form-select" aria-label="Ciudad" name="Ciudad" id="Ciudad">
                                            <option value="Teziutlan">Teziutlán</option>
                                            <option value="Apizaco">Apizaco</option>
                                            <option value="Puebla">Puebla</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Edad" class="form-label">Edad</label><br>
                                        <label for="EdadInicio" class="form-label">Desde:</label>
                                        <select class="form-select" aria-label="edad" name="EdadInicio" id="EdadInicio">
                                            <option value="15">15 años</option>
                                            <option value="16">16 años</option>
                                            <option value="17">17 años</option>
                                            <option value="18">18 años</option>
                                            <option value="19">19 años</option>
                                            <option value="20">20 años</option>
                                            <option value="21">21 años</option>
                                            <option value="22">22 años</option>
                                            <option value="23">23 años</option>
                                            <option value="24">24 años</option>
                                            <option value="25">25 años</option>
                                            <option value="26">26 años</option>
                                            <option value="27">27 años</option>
                                            <option value="28">28 años</option>
                                            <option value="29">29 años</option>
                                            <option value="30">30 años</option>
                                            <option value="31">31 años</option>
                                            <option value="32">32 años</option>
                                            <option value="33">33 años</option>
                                            <option value="34">34 años</option>
                                            <option value="35">35 años</option>
                                            <option value="36">36 años</option>
                                            <option value="37">37 años</option>
                                            <option value="38">38 años</option>
                                            <option value="39">39 años</option>
                                            <option value="40">40 años</option>
                                            <option value="41">41 años</option>
                                            <option value="42">42 años</option>
                                            <option value="43">43 años</option>
                                            <option value="44">44 años</option>
                                            <option value="45">45 años</option>
                                            <option value="46">46 años</option>
                                            <option value="47">47 años</option>
                                            <option value="48">48 años</option>
                                            <option value="49">49 años</option>
                                            <option value="50">50 años</option>
                                        </select>
                                        <label for="EdadFin" class="form-label">Hasta:</label>
                                        <select class="form-select" aria-label="edad" name="EdadFin" id="EdadFin">
                                            <option value="15">15 años</option>
                                            <option value="16">16 años</option>
                                            <option value="17">17 años</option>
                                            <option value="18">18 años</option>
                                            <option value="19">19 años</option>
                                            <option value="20">20 años</option>
                                            <option value="21">21 años</option>
                                            <option value="22">22 años</option>
                                            <option value="23">23 años</option>
                                            <option value="24">24 años</option>
                                            <option value="25">25 años</option>
                                            <option value="26">26 años</option>
                                            <option value="27">27 años</option>
                                            <option value="28">28 años</option>
                                            <option value="29">29 años</option>
                                            <option value="30">30 años</option>
                                            <option value="31">31 años</option>
                                            <option value="32">32 años</option>
                                            <option value="33">33 años</option>
                                            <option value="34">34 años</option>
                                            <option value="35">35 años</option>
                                            <option value="36">36 años</option>
                                            <option value="37">37 años</option>
                                            <option value="38">38 años</option>
                                            <option value="39">39 años</option>
                                            <option value="40">40 años</option>
                                            <option value="41">41 años</option>
                                            <option value="42">42 años</option>
                                            <option value="43">43 años</option>
                                            <option value="44">44 años</option>
                                            <option value="45">45 años</option>
                                            <option value="46">46 años</option>
                                            <option value="47">47 años</option>
                                            <option value="48">48 años</option>
                                            <option value="49">49 años</option>
                                            <option value="50">50 años</option>
                                            <option value="51">Más de 51 años</option>
                                        </select>
                                    </div>
                                    <label for="SEXO" class="form-label">Sexo</label>
                                    <select class="form-select" aria-label="Default select example" name="SEXO"
                                        id="SEXO">
                                        <option value="H">Hombres</option>
                                        <option value="M">Mujeres</option>
                                        <option value="A">Ambos</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div align="center" class="card-header">
                                        Identidad
                                    </div>
                                    <!--<div class="mb-3">
                                        <label for="Pagina_FB" class="form-label">Página de Facebook</label>
                                        <input type="text" class="form-control" name="Pagina_FB" id="Pagina_FB">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Activo" class="form-label">Status</label>
                                        <select class="form-select" aria-label="Default select example" name="Activo"
                                            id="Activo" required>
                                            <option value="1">Activo</option>
                                        </select>
                                    </div>-->
                                    <div class="mb-3" align="center">
                                        <label for="Imagen">Elije un archivo de imagen</label>
                                        <input type="file" class="form-control-file" name="Imagen"
                                            accept="image/gif, image/jpeg" /><br>
                                    </div>
                                    <div align="center"><button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
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
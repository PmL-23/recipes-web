<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="icon" type="favicon/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="../css/0-globals.css">
    <link rel="stylesheet" href="../css/a-header.css">
    <link rel="stylesheet" href="../css/b-search.css">
    <link rel="stylesheet" href="../css/c-countries.css">
    <link rel="stylesheet" href="../css/d-slider.css">
    <link rel="stylesheet" href="../css/e-BarraLateral.css">
    <link rel="stylesheet" href="../css/e-admin.css">
    <link rel="stylesheet" href="../css/f-recomendacion.css">
    <link rel="stylesheet" href="../css/j-slider.css">
    <link rel="stylesheet" href="categorias.css">

    <link rel="stylesheet" href="../css_inicio_sesion/estilo_sesion.css">
    <link rel="stylesheet" href="../css_inicio_sesion/iniciarSesion.css">
    <script src="js/inicioSesion.js" defer></script>

    <link rel="stylesheet" href="../CarpetaPerfil/EstilosPerfil.css">
    <link rel="stylesheet" href="../CarpetaFavoritos/EstilosFavoritos.css">

    <link rel="stylesheet" href="EstilosPerfil.css">

    <link rel="stylesheet" href="../css/recetas.css">
    <link rel="stylesheet" href="../css/recetas-banner.css">
    <link rel="stylesheet" href="../css/carrousel.css">
    <script src="recetas.js" defer></script>

    <link rel="stylesheet" href="crear_receta_style.css">
    <script src="crear_receta_script.js" defer></script>
    
    <link rel="stylesheet" href="css/e-BarraLateral.css">
    <link rel="stylesheet" href="css/j-slider.css">

    <script src="categorias.js" defer></script>
    

    <!-- link SwiperJS CSS biblioteca para sliders -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Link SwiperJS script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <!-- Link custom script -->
    <script src="script.js" defer></script>
    <script src="manejarModal.js" defer></script>
    <script src="recetas.js" defer></script>

    <script src="../CarpetaPerfil/JSPerfil.js" defer></script>



    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>



<body>
    <!-- header -->
    <header class="header">
        <nav class="navegacion-principal nav">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="../index/index.php">
                    <img class="logo" src="../images/logo.png" alt="logo">  
                </a>
                <ul class="nav justify-content-end"> 
                    <li class="nav-item">
                        <a class="boton1" href="../index/index.php">
                            <i class="bi bi-house-door"></i>
                            <span class="texto-icon">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="boton1 buscador-header" href="../buscador/buscador.php">
                            <i class="bi bi-search"></i>
                            <span class="texto-icon">Buscar</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="boton1 dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-compass"></i>
                            <span class="texto-icon">Explorar</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Países</a></li>
                            <li><a class="dropdown-item" href="../categorias/categorias.php">Categorías</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="notificaciones btn btn-outline-light boton-menu" href="#">
                            <i class="bi bi-bell"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                    <!--barra lateral-->
                        <button class="btn btn-outline-light boton-menu" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <!-- Icono de menú lateral -->
                            <i class="bi bi-list"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel">Menú Recetas de America</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body container">

                                <div class="row DivConLogIn" id="IDDivConLogIn">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-0 ">

                                        <li class="nav-item justify-content-center">
                                            <a class="boton-login col-6" href="../html_inicio_sesion/iniciarSesion.php">Iniciar Sesion</a>
                                        </li>

                                        <li class="nav-item justify-content-center">
                                            <a class="boton-login col-6" href="../html_inicio_sesion/Registrarse.php">Registrarse</a>
                                        </li>

                                        <li class="nav-item justify-content-center">
                                            <a class="boton-login col-6" href="#"><img alt="logo-google" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/480px-Google_%22G%22_logo.svg.png"/>Ingresar con Google</a>
                                        </li>

                                        <li class="nav-item justify-content-center">
                                            <a class="nav-link mt-5" href="../CarpetaPerfil/Perfil.php">Perfil</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="../crearReceta/crear_receta.php">Subir Receta</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="../CarpetaFavoritos/Favoritos.php">Recetas Favoritas </a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link" href="../admin/index.php">Administración</a>
                                        </li>

                                        <li class="nav-item justify-content-center mt-5 text-center">
                                            <a class="btn btn-outline-danger" href="#">Cerrar Sesion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
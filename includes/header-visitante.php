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
                            <li><a class="dropdown-item" href="../index/index.php">Países</a></li>
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
                                            <a class="nav-link mt-5" href="#">Perfil</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="#">Subir Receta</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="#">Recetas Favoritas </a>
                                        </li>
                                        <hr>
                                    </ul>
                                </div>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
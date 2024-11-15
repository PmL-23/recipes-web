<?php
include 'conec_db.php'; 
include '../notificaciones/notificacion.php';
require_once("../inicio_sesion/GoogleOAuth.php");

if (isset($client) && $client->getAccessToken()) {
    // Obtener la información del usuario si está autenticado
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();
}

if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];

    $notificaciones = obtenerNotificacionesNoLeidas($conn, $idUsuario);
}
?>

<!-- Header -->
<header class="header">
    <script src="../notificaciones/notificacion.js" defer></script>
    <script src="../notificaciones/notificacion_vista.js" defer></script>
    <nav class="navegacion-principal nav">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="m-0 container d-flex flex-row align-items-center">
                <a class="navbar-brand" href="../index/index.php"><img class="logo" src="../images/logo.png" alt="logo"></a>

                <?php
                    if (isset($_SESSION['id']) && $_SESSION['id']) {
                        echo '<h2 class="ms-2 text-white">Bienvenido '.$_SESSION['nomCompleto'].'</h2>';
                    } else {
                        echo '<h2 class="ms-2 text-white">Bienvenido invitado :)</h2>';
                    }
                ?>
            </div>
                
            <ul class="flex-nowrap w-100 nav justify-content-end"> 
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
                        <li><a class="dropdown-item" href="../categorias/categorias.php">Categorías</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <button id="btnNotificaciones" class="notificaciones btn btn-outline-light boton-menu position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle badge rounded-pill">
                    <?php echo isset($notificaciones) ? count($notificaciones) : 0; ?>
                    <span class="visually-hidden">notificaciones no leídas</span>
                    </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="btnNotificaciones">
                    <?php if (!empty($notificaciones)) {
                            foreach ($notificaciones as $notificacion) {
                                if ($notificacion['tipo'] == 'nuevo_comentario') {
                                    $urlReceta = "../recetas/receta-plantilla.php?id=" . $notificacion['id_publicacion'];
                                } elseif ($notificacion['tipo'] == 'nuevo_seguidor') {
                                    $urlReceta = "../CarpetaPerfil/Perfil.php?NombreDeUsuario=" . $notificacion['username'];
                                } else {
                                    $urlReceta = "../recetas/receta-plantilla.php?id=" . $notificacion['id_publicacion']; 
                                }
                            echo "<li>
                            <a class='dropdown-item' href='" . $urlReceta . "' data-id='" . $notificacion['id_notificacion'] . "'>
                            <strong>" . $notificacion['username'] . "</strong> 
                            " . getNotificationMessage($notificacion['tipo'], $notificacion['titulo']) . "<br>
                            <small class='text-muted'>" . $notificacion['fecha'] . "</small>
                            </a>
                            </li>";
                        }} else {
                            echo "<li><a class='dropdown-item' href='#'>No tienes notificaciones</a></li>";
                            }
                        ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <button class="btn btn-outline-light boton-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Menú Recetas de America</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body container">
                            <div class="row DivConLogIn" id="IDDivConLogIn">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-0 ">
                                    <?php
                                    if (isset($_SESSION['id']) && $_SESSION['id']) { 
                                        echo '<li class="nav-item justify-content-center">
                                            <a class="nav-link mt-5" href="../perfil-usuario/mi_perfil.php">Perfil</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="../crearReceta/crear_receta.php">Subir Receta</a>
                                        </li>
                                        <hr>
                                        <li class="nav-item justify-content-center mt-2">
                                            <a class="nav-link " href="../CarpetaFavoritos/Favoritos.php">Recetas Favoritas </a>
                                        </li>
                                        <hr>';

                                        if (isset($_SESSION['id']) && Permisos::tienePermiso('Acceder a Administración', $_SESSION['id'])) {
                                            echo '<li class="nav-item justify-content-center mt-2">
                                                <a class="nav-link" href="../admin/index.php">Administración</a>
                                            </li>';
                                        }

                                        echo '<li class="nav-item justify-content-center mt-5 text-center">
                                                <a class="btn btn-outline-danger" href="../inicio_sesion/cerrarSesion.php">Cerrar Sesion</a>
                                            </li>'; 
                                    } else {
                                        echo '<li class="nav-item justify-content-center">
                                            <a class="boton-login col-6" href="../inicio_sesion/iniciarSesion.php">Iniciar Sesion</a>
                                        </li>
                                        <li class="nav-item justify-content-center">
                                            <a class="boton-login col-6" href="../inicio_sesion/registrarse.php">Registrarse</a>
                                        </li>';

                                        if (isset($authUrl)) {
                                            echo '<li class="nav-item justify-content-center">
                                                    <a class="boton-login col-6" href="' . $authUrl . '"><img alt="logo-google" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/480px-Google_%22G%22_logo.svg.png"/>Ingresar con Google</a>
                                                </li>'; 
                                        }
                                        
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


</header>





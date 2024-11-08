<?php include '../includes/conec_db.php' ?>
<?php

require_once('./Scripts-Valoracion/getValoracionActual.php');
require_once('./Scripts-Favorito/getEstadoDeFavorito.php');
require_once('../includes/razonesReporte.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&family=Noto+Sans+Display:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="../css/recetas-banner.css"> -->
    <link rel="stylesheet" href="publicacion.css">
    <link rel="stylesheet" href="../css/recetas.css">
    <link rel="stylesheet" href="../css/carrousel.css">
    <!--   <link rel="stylesheet" href="estilos.css"> -->
    <!-- Scripts -->
    <script src="recetas.js" defer></script>
    <script src="compartir.js" defer></script>
    <script src="./Scripts-Favorito/favoritoReceta.js" defer></script>
    <script src="./Scripts-Reportes/reporteReceta.js" defer></script>
    <script src="./Scripts-Reportes/reporteComentario.js" defer></script>
    <script src="./Scripts-Comentarios/comentariosReceta.js" type="module" defer></script>
    <script src="./Scripts-Valoracion/valoracionReceta.js" type="module" defer></script>

    <?php
    include '../includes/head.php';
    ?>

</head>

<body>
    <?php include '../includes/header.php' ?>
    <?php include '../recetas/manejoGetReceta.php' ?>
    <?php if ($usuarioID === $autor) { ?>
        <div class="d-flex justify-content-end p-3">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Ver
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Editar publicación</a></li>
                <li><a class="dropdown-item" href="#">Eliminar publicación</a></li>
            </ul>
        </div>
    <?php } ?>


    <div class="contenido-principal container my-5 ps-md-2">
        <div class="">
            <div class="perfil-usuario">
                <div class="row align-items-center">
                    <div class="col-md-1 col-sm-6">
                        <div>
                            <!-- Aca va la foto del usuario -->
                            <img class="mt-3 rounded" src="<?php echo $fotoAutor; ?>" alt="Perfil del usuario" id="portada-receta" height="80">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-1">
                        <a class="text-decoration-none text-dark" href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=<?php echo "$nombreAutor"; ?>">
                            <h5 id="nombre-usuario">
                                <!-- Aca va el nombre del usuario -->
                                <?php echo "@$nombreAutor"; ?>
                            </h5>
                        </a>
                    </div>
                    <div class="col-md-7 col-sm-2 text-end">
                        <p class="text-muted d-flex flex-column">
                            <span>
                                <?php echo explode(" ", (new DateTime($fecha))->format('d-m-Y'))[0]; ?>
                            </span>
                            <span>
                                <?php echo substr(explode(" ", $fecha)[1], 0, 5); ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="datos-receta row align-items-start">
                <div class="col-md-6 col-sm-12 row">

                    <!-- Aca va la imagen de la receta -->
                    <?php
                    if (!empty($imagenes)) {
                        echo '<div class="">';
                        echo '<img src="' . $imagenes[0] . '" alt="Receta" class="portada rounded img-fluid" id="portada-receta">';
                        echo '</div>';
                        if (count($imagenes) > 1) {
                            echo '<div class="w-25 d-flex">';
                            for ($i = 1; $i < count($imagenes); $i++) {
                                echo '<img src="' . $imagenes[$i] . '" alt="Receta" class="rounded img-fluid">';
                            }
                            echo '</div>';
                        }
                    } else {
                        echo 'No hay portada';
                    }
                    ?>
                </div>

                <div class="content-info col-md-6 col-sm-12 my-5 d-flex flex-column justify-content-between">

                    <div class="ms-md-5">

                        <h1 class="titulo-receta">
                            <!-- titulo de la receta -->
                            <?php echo $titulo; ?>
                        </h1>
                        <p>
                            <!-- descripcion de la receta -->
                            <?php echo $descripcion; ?>
                        </p><br>
                        <p class="categoria-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">
                            <?php echo $categoriaTitulo; ?>
                            <!-- todas las categorias -->
                        </p>
                        <p class="estilosCategorias">
                            <?php
                            if (!empty($etiquetas)) {
                                foreach ($etiquetas as $etiqueta) {
                                    echo '<span class="etiqueta">' . $etiqueta["titulo"] . '</span> ';
                                }
                            } else {
                                echo 'No hay etiquetas';
                            }
                            ?>

                        </p>

                    </div>

                    <div class="mt-3 d-flex flex-row justify-content-between">

                        <div class="acciones my-2">

                            <button type="button" class="btn btn-outline-warning bg-none" id="btn-reportar" data-bs-toggle="modal" data-bs-target="#modalReportarPublicacion">
                                <i class="bi bi-flag-fill text-black"></i>
                            </button>

                            <button type="button" class="btn btn-outline-secondary bg-none" id="btnCompartir" data-bs-toggle="modal" data-bs-target="#modalCompartir">
                                <i class="bi bi-share-fill"></i>
                            </button>

                            <button type="button" id="btn-favorito" class="btn btn-outline-danger <?php if (!empty($EstadoDeRecetaFav['id_favorito']) && is_numeric($EstadoDeRecetaFav['id_favorito'])) echo "active"; ?>">
                                <i class="bi bi-heart-fill"></i>
                            </button>

                        </div>

                        <div class="valoracion mx-5 d-flex flex-column justify-content-center">

                            <span class="m-0">Califica esta receta</span>

                            <span class="puntuacion text-center fw-bolder">
                                <?php if (isset($ValoracionDeReceta['puntuacion']) && $ValoracionDeReceta['puntuacion']) {
                                    echo $ValoracionDeReceta['puntuacion'];
                                } else {
                                    echo "-";
                                } ?>
                            </span>

                            <div id="valoracion" data-value="<?php if (!empty($ValoracionDeReceta['puntuacion']) && is_numeric($ValoracionDeReceta['puntuacion'])) echo $ValoracionDeReceta['puntuacion'];
                                                                else echo "0"; ?>">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if (!empty($ValoracionDeReceta['puntuacion']) && is_numeric($ValoracionDeReceta['puntuacion'])) {
                                        if ($i <= $ValoracionDeReceta['puntuacion']) {
                                ?>
                                            <span class="estrella hover" data-value="<?php echo $i ?>">&#9733;</span><?php
                                                                                                                    } else {
                                                                                                                        ?><span class="estrella" data-value="<?php echo $i ?>">&#9733;</span><?php
                                                                                                                                                                                            }
                                                                                                                                                                                        } else {
                                                                                                                                                                                                ?><span class="estrella" data-value="<?php echo $i ?>">&#9733;</span><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                        ?>
                            </div>

                            <input type="hidden" name="valoracion" value="0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor-detalles container text-center w-75">
        <div class="row align-items-start">
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <!-- pais -->
                    <?php
                    if (!empty($paises)) {
                        foreach ($paises as $pais) {
                            echo '<img src="../svg/' . $pais["ruta_imagen_pais"] . '" alt="Bandera" width="35" class="bandera" id="bandera-receta"> ';
                            echo '<p>' . $pais["nombre"] . '</p>';
                        }
                    } else {
                        echo 'No hay paises disponibles';
                    }
                    ?>


                </div>
            </div>
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <img src="../svg/bar-chart-line-fill.svg" width="25px" class="icono-item" alt="Dificultad icon">
                    <!-- <h5>Dificultad</h5> -->
                    <p id="dificultadRecetaDB" class="dificultad">
                        <?php echo $dificultad; ?>
                    </p>
                </div>
            </div>
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Dificultad icon">
                    <!-- <h5>Tiempo</h5> -->
                    <p id="tiempoRecetaDB" class="tiempo">
                        <!-- tiempo en minutos de la receta -->
                        <?php echo $minutos_prep . 'min'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Ingredientes</h3>
        <div class="">
            <ol class="list-group">
                <!-- todos los ingredientes como una lista -->
                <?php
                if (!empty($ingredientes)) {
                    foreach ($ingredientes as $ingrediente) {
                        echo '<li class="list-group-item bg-transparent border-0 p-0">' . $ingrediente["nombre"] . ': ' . $ingrediente["cantidad"] . '</li> ';
                    }
                } else {
                    echo 'No hay ingredientes';
                } ?>
            </ol>
        </div>
    </div>

    <div class="container pasos-receta bg-white mt-4 border-0 shadow-none">
        <h3>Pasos</h3>
        <ol class="list-group list-group-numbered">
            <?php foreach ($pasos as $paso): ?>
                <li class="mb-4 bg-transparent border-0 p-0">
                    <strong>Paso <?php echo $paso['num_paso']; ?>:</strong> <?php echo $paso['texto']; ?>
                    <?php if (!empty($paso['imagenes'])): ?>
                        <div class="imagenes-pasos row mt-2">
                            <?php foreach ($paso['imagenes'] as $imagenPaso): ?>
                                <div class="imagenes-pasos col-md-6 mt-2"></div>
                                <img src="<?php echo $imagenPaso; ?>" class="w-50 m-2" alt="Imagen del paso" class="img-fluid mb-2">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>


    <div class="container mt-5 d-flex flex-row justify-content-around">

        <div class="w-75 mt-2 mb-5">

            <div class="comentarios d-flex flex-column" id="seccionComentarios">

                <div>
                    <div class="d-flex flex-row justify-content-between">

                        <h5 id="comentariosContador" class="m-0 w-50">Comentarios</h5>
                        <span class="w-100 d-block me-3 text-danger text-end" id="comment-error-msg"></span>

                    </div>

                    <form action="" method="post" id="form-comentario" class="my-3">

                        <textarea id="comentarioText" class="form-control border border-success" name="texto_comentario" maxlength="255" rows="4" cols="50" placeholder="Escribe tu comentario..." required></textarea>
                        <input type="hidden" name="id_publicacion_receta" id="id_publicacion_receta" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>">

                        <div class="d-flex justify-content-between align-items-center">

                            <p id="contadorCaracteres" class="ms-3 m-0">Límite de caracteres: 0/255</p>
                            <button type="submit" class="btn btn-success mt-2" id="btnPublicarComentario">Publicar comentario</button>

                        </div>

                    </form>

                </div>

                <ul class="list-group mt-3 w-100" id="listaComentarios"></ul>

            </div>
        </div>

        <div class="valoraciones w-25 m-5 text-center">

            <h5 id="numPromedioValoraciones" class=""></h5>

            <div id="estrellasPromedioValoraciones" class="d-flex flex-row justify-content-center"></div>

            <span class="fw-medium" id="valoracionesContador"></span>

            <div class="w-100 porc-valoraciones m-5 ms-0 text-center">

                <span class="d-flex">
                    <p class="w-100 m-0 me-2">5 estrellas</p>

                    <div class="w-100 progress my-2 contenedor-porcentaje-cinco-estrellas" role="progressbar" aria-label="Warning example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar barra-porcentaje-cinco-estrellas" style="width: 0%"></div>
                    </div>

                    <p class="ms-2 cant-val-cinco-estrellas">1</p>
                </span>

                <span class="d-flex">
                    <p class="w-100 m-0 me-2">4 estrellas</p>

                    <div class="w-100 progress my-2 contenedor-porcentaje-cuatro-estrellas" role="progressbar" aria-label="Warning example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar barra-porcentaje-cuatro-estrellas" style="width: 0%"></div>
                    </div>

                    <p class="ms-2 cant-val-cuatro-estrellas">0</p>
                </span>

                <span class="d-flex">
                    <p class="w-100 m-0 me-2">3 estrellas</p>

                    <div class="w-100 progress my-2 contenedor-porcentaje-tres-estrellas" role="progressbar" aria-label="Warning example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar barra-porcentaje-tres-estrellas" style="width: 0%"></div>
                    </div>

                    <p class="ms-2 cant-val-tres-estrellas">2</p>
                </span>

                <span class="d-flex">
                    <p class="w-100 m-0 me-2">2 estrellas</p>

                    <div class="w-100 progress my-2 contenedor-porcentaje-dos-estrellas" role="progressbar" aria-label="Warning example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar barra-porcentaje-dos-estrellas" style="width: 0%"></div>
                    </div>

                    <p class="ms-2 cant-val-dos-estrellas">0</p>
                </span>

                <span class="d-flex">
                    <p class="w-100 m-0 me-2">1 estrella</p>

                    <div class="w-100 progress my-2 contenedor-porcentaje-una-estrella" role="progressbar" aria-label="Warning example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar barra-porcentaje-una-estrella" style="width: 0%"></div>
                    </div>

                    <p class="ms-2 cant-val-una-estrella">0</p>
                </span>

            </div>

        </div>

    </div>

    <!-- MODAL ELIMINAR COMENTARIO PROPIO -->

    <div class="p-0 modal fade" id="modalEliminarComentario" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModalEliminarComentario">Eliminar comentario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <span id="mensajeModalEliminarComentario">¿Está seguro de que deseas eliminar tu comentario: "" ?</span>
                </div>

                <div class="modal-footer">
                    <form action="" id="formulario-eliminar-comentario" class="w-100">
                        <input type="hidden" id="ComentarioID" name="ComentarioID" value="" />
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Si, eliminar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL REPORTAR COMENTARIO -->

    <div class="modal fade p-0" id="modalReportarComentario" tabindex="-1" aria-labelledby="modalReportarComentarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportarComentarioLabel">Reportar comentario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="formReportarComentario">

                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <select class="form-select" id="motivo" name="motivo" required>
                                <option value="">Seleccione un motivo</option>
                                <?php if (!empty($razonesReporte)) {
                                    foreach ($razonesReporte as $razon) {
                                        echo '<option value=' . $razon['id_razon'] . '>' . $razon['descripcion'] . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="observacion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="observacion" id="observacion" rows="7" placeholder="Detalles sobre el motivo de reporte.." required></textarea>
                        </div>

                        <input type="hidden" name="id_comentario" id="id_comentario" value="">

                        <button type="submit" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Enviar Reporte</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REPORTAR PUBLICACIÓN -->

    <div class="modal fade p-0" id="modalReportarPublicacion" tabindex="-1" aria-labelledby="modalReportarPublicacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportarPublicacionLabel">Reportar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="formReportarPublicacion">

                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <select class="form-select" id="motivo" name="motivo" required>
                                <option value="">Seleccione un motivo</option>
                                <?php if (!empty($razonesReporte)) {
                                    foreach ($razonesReporte as $razon) {
                                        echo '<option value=' . $razon['id_razon'] . '>' . $razon['descripcion'] . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="observacion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="observacion" id="observacion" rows="7" placeholder="Detalles sobre el motivo de reporte.." required></textarea>
                        </div>

                        <input type="hidden" name="id_publicacion_receta" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>">
                        <input type="hidden" id="logged_in_user" value="<?php if (isset($_SESSION['nomUsuario'])) echo $_SESSION['nomUsuario']; ?>">

                        <button type="submit" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Enviar Reporte</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL COMPARTIR PUBLICACIÓN -->
    <?php

    ?>
    <div id="modalCompartir" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2>Compartir</h2>
                <div class="redes my-5">
                    <!-- compartir en fc -->
                    <a href="#" onclick="compartirPorFacebook(<?php echo $idPublicacion; ?>)"><i class="bi bi-facebook"></i></a>

                    <!-- compartir en ig -->
                    <a href="#" onclick="compartirPorInstagram(<?php echo $idPublicacion; ?>)"><i class="bi bi-instagram"></i></a>
                    
                    <!-- compartir en x -->
                    <a href="https://www.instagram.com/" onclick="compartirPorTwitter(<?php echo $idPublicacion; ?>)"><i class="bi bi-twitter"></i></a>
                    
                    <!-- compartir por link -->
                    <a href="#" onclick="compartirReceta(<?php echo $idPublicacion; ?>)"><i class="bi bi-link-45deg"></i></a>
                    
                    <!-- compartir por wsp -->
                    <a href="#" onclick="compartirPorWhatsApp(<?php echo $idPublicacion; ?>)"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST PARA NOTIFICAR MENSAJES DE ÉXITO -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">

        <div id="formToastSuccess" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toast-success-msg" class="toast-body">
                    -Mensaje exitoso correspondiente-
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

    <!-- TOAST PARA NOTIFICAR MENSAJES DE ERROR -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">

        <div id="formToastError" class="toast align-items-center text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toast-error-msg" class="toast-body">
                    -Mensaje de error correspondiente-
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

    <!-- PUBLICACIONES similares -->
    <div class="container">
        <h1 class="">Publicaciones similares</h1>

    </div>

    <?php include '../includes/footer.php' ?>
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

    <link rel="stylesheet" href="../css/recetas.css">
    <link rel="stylesheet" href="../css/recetas-banner.css">
    <link rel="stylesheet" href="../css/carrousel.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="recetas.js" defer></script>
    <script src="./Scripts-Comentarios/comentariosReceta.js" type="module" defer></script>
    <script src="./Scripts-Valoracion/valoracionReceta.js" type="module" defer></script>
    <script src="./Scripts-Favorito/favoritoReceta.js" defer></script>
    <script src="./Scripts-Reportes/reporteReceta.js" defer></script>

    <?php
    include '../includes/head.php';
    include 'manjeoGetReceta.php'; //aca esta en manejo de las recetas
    ?>

</head>

<body>
    <?php include '../includes/header.php' ?>

    <div class="contenido-principal container my-5 ps-5">
        <div class="container">
            <div class="perfil-usuario my-3">
                <div class="row align-items-center">
                    <div class="col-md-1 col-sm-6">
                        <div>
                            <!-- Aca va la foto del usuario -->
                            <img class="mt-3 rounded" src="<?php
                                                            if (empty($fotoUsuario)) {
                                                                echo '../images/default-image.png'; // Imagen por defecto
                                                            } else {
                                                                echo $fotoUsuario; // Foto del usuario
                                                            }
                                                            ?>" alt="Imagen del usuario" id="portada-receta" height="80">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-1">
                        <h5 id="nombre-usuario">
                            <!-- Aca va el nombre del usuario -->
                            <?php echo "@$nombreUsuario"; ?>
                        </h5>
                    </div>
                    <div class="col-md-7 col-sm-2 text-end">
                        <p class="text-muted">Fecha de publicación:
                            <span>
                                <?php echo $fecha; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="datos-receta row align-items-start">
                <div class="contenedor-img d-flex col-md-6 col-sm-12">
                    <!-- Aca va la imagen de la receta -->
                    <img src="<?php echo $imagen; ?>" alt="Receta" class="portada rounded img-fluid" id="portada-receta">
                </div>
                <div class="content-info col-md-6 col-sm-12 my-5 d-flex flex-column justify-content-between">

                    <div>

                        <h2>
                            <!-- titulo de la receta -->
                            <?php echo $titulo; ?>
                        </h2>
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
                                    echo '<span class="etiqueta">' . $etiqueta . '</span> ';
                                }
                            } else {
                                echo 'No hay etiquetas';
                            }
                            ?>
                            <!-- ni idea que va aca -->
                        </p>

                    </div>

                    <div class="mt-3 d-flex flex-row justify-content-between">

                        <div class="acciones my-2">

                            <button type="button" class="btn btn-outline-warning bg-none" id="btn-reportar" data-bs-toggle="modal" data-bs-target="#modalReportar">
                                <i class="bi bi-flag-fill text-black"></i>
                            </button>

                            <button type="button" class="btn btn-outline-secondary bg-none" id="btnCompartir">
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
                                ?><span class="estrella hover" data-value="<?php echo $i ?>">&#9733;</span><?php
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
                    <!-- imagen del pais al que pertenece la receta -->

                    <?php
                    if (!empty($paisRecetas)) {
                        foreach ($paisRecetas as $paisReceta) {
                            echo '<img src="../svg/' . $paisReceta . '" alt="Bandera" width="35" class="bandera" id="bandera-receta"> ';
                        }
                    } else {
                        echo 'No hay banderas disponibles';
                    }
                    ?>

                    <h5 id="nombrePaisRecetaDB">
                        <?php
                        echo 'origen';
                        ?>
                    </h5>
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
                        echo '<li class="list-group-item">' . $ingrediente . '</li> ';
                    }
                } else {
                    echo 'No hay ingredientes';
                } ?>
            </ol>
        </div>
    </div>

    <div class="pasos-receta bg-white mt-4 ms-6 border-0 shadow-none">
        <h3>Pasos de la Receta</h3>
        <ol class="list-unstyled p-0 m-0">
            <!-- todos los pasos como una lista -->
            <?php
            if (!empty($pasos)) {
                foreach ($pasos as $index => $paso) {
                    // numero antes del paso
                    if (isset($numerosPasos[$index])) {
                        echo '<li class="mb-4 bg-transparent border-0 p-0">' .
                            'Paso ' . htmlspecialchars($numerosPasos[$index], ENT_QUOTES, 'UTF-8') . ': ' .
                            htmlspecialchars($paso, ENT_QUOTES, 'UTF-8') . '</li>';
                    } else {
                        echo '<li class="mb-4 bg-transparent border-0 p-0">' .
                            htmlspecialchars($paso, ENT_QUOTES, 'UTF-8') . '</li>';
                    }
                    // imagen del paso
                    if (isset($imagenesPasos[$index])) {
                        echo '<img src="' . htmlspecialchars($imagenesPasos[$index], ENT_QUOTES, 'UTF-8') . '" alt="Imagen del paso" class="img-fluid mb-2" style="width: 40%; height: 40%;">';
                    }
                }
            } else {
                echo 'No hay pasos';
            }
            ?>
        </ol>
    </div>
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

    <!-- MODAL REPORTAR PUBLICACIÓN -->

    <div class="modal fade p-0" id="modalReportar" tabindex="-1" aria-labelledby="modalReportarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReportarLabel">Reportar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="formReportar">

                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <select class="form-select" id="motivo" name="motivo" required>
                                <option value="">Seleccione un motivo</option>
                                <?php if (!empty($razonesReporte)) {
                                    foreach ($razonesReporte as $razon) {
                                        echo '<option value='.$razon['id_razon'].'>'.$razon['descripcion'].'</option>';
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="observacion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="observacion" id="observacion" rows="7" placeholder="Detalles sobre el motivo de reporte.." required></textarea>
                        </div>

                        <input type="hidden" name="id_publicacion_receta" value="<?php if( isset($_GET['id'])) echo $_GET['id']; ?>">

                        <button type="submit" class="btn btn-dark">Enviar Reporte</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL COMPARTIR PUBLICACIÓN -->

    <div id="modalCompartir" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h2>Compartir</h2>
                <div class="redes my-5">
                    <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <h1 class="ms-5">Publicaciones similares</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="receta-item card">
                    <div class="card_landing" style="background-image: url(../images/milanesas_lp.jpg);">
                        <h6>Milanesas</h6>
                    </div>
                    <div class="card_info">
                        <div class="head">
                            <p class="title">Milanesas</p>
                            <div class="description">
                                <div class="item">
                                    <i class="fas fa-clock"></i>
                                    <p>30 min</p>
                                </div>
                                <div class="item">
                                    <i class="fas fa-user"></i>
                                    <p>4</p>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p class="title">Ingredientes:</p>
                            <ul class="list">
                                <li>500g de carne</li>
                                <li>1 taza de pan rallado</li>
                                <li>2 huevos</li>
                                <li>Sal y pimienta al gusto</li>
                            </ul>
                        </div>
                        <div class="action">
                            <a href="#" class="btn">Quiero la receta!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="receta-item card">
                    <div class="card_landing" style="background-image: url(../images/empanadas_lp.jpg);">
                        <h6>Empanadas</h6>
                    </div>
                    <div class="card_info">
                        <div class="head">
                            <p class="title">Empanadas</p>
                            <div class="description">
                                <div class="item">
                                    <i class="fas fa-clock"></i>
                                    <p>45 min</p>
                                </div>
                                <div class="item">
                                    <i class="fas fa-user"></i>
                                    <p>6</p>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p class="title">Ingredientes:</p>
                            <ul class="list">
                                <li>500g de carne picada</li>
                                <li>1 cebolla</li>
                                <li>2 huevos</li>
                                <li>1 paquete de masa para empanadas</li>
                            </ul>
                        </div>
                        <div class="action">
                            <a href="#" class="btn">Quiero la receta!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="receta-item card">
                    <div class="card_landing" style="background-image: url(../images/nioquis_lp.jpg);">
                        <h6>Ñoquis</h6>
                    </div>
                    <div class="card_info">
                        <div class="head">
                            <p class="title">Ñoquis</p>
                            <div class="description">
                                <div class="item">
                                    <i class="fas fa-clock"></i>
                                    <p>50 min</p>
                                </div>
                                <div class="item">
                                    <i class="fas fa-user"></i>
                                    <p>6</p>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <p class="title">Ingredientes:</p>
                            <ul class="list">
                                <li>Harina unos g</li>
                                <li>3kg de queso para rallar</li>
                                <li>2 huevos</li>
                                <li>1 paquete de masa para empanadas</li>
                            </ul>
                        </div>
                        <div class="action">
                            <a href="#" class="btn">Quiero la receta!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php include '../includes/footer.php' ?>
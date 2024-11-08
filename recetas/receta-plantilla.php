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
    <link rel="stylesheet" href="publicacion.css">
    <link rel="stylesheet" href="../css/recetas.css">
    <link rel="stylesheet" href="../css/carrousel.css">
    <!--   <link rel="stylesheet" href="estilos.css"> -->
    <!-- Scripts -->
    <script src="recetas.js" defer></script>
    <script src="./Scripts-Favorito/favoritoReceta.js" defer></script>
    <script src="./Scripts-Reportes/reporteReceta.js" defer></script>
    <script src="./Scripts-Reportes/reporteComentario.js" defer></script>
    <script src="./Scripts-Comentarios/comentariosReceta.js" type="module" defer></script>
    <script src="./Scripts-Valoracion/valoracionReceta.js" type="module" defer></script>
    <!-- Modales -->


    <?php
    include '../includes/head.php';
    ?>

</head>

<body>
    <?php include '../includes/header.php' ?>
    <?php include '../recetas/manejoGetReceta.php'?>


    <div class="contenido-principal container w-100 my-md-4 my-2">
        <?php if ($usuarioID === $autor) { ?> 
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-editar" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="editar-receta.php?id=<?php echo $idPublicacion; ?>">Editar publicación</a></li>
                    <li><a class="dropdown-item" href="#">Eliminar publicación</a></li>
                </ul>
            </div>
        <?php } ?>

            <div class="perfil-usuario  ms-md-4 ms-3">    
                <div class="row">
                <div class="col d-flex align-items-center mb-3 mt-lg-2">
                    <div class="contenedor-perfil d-flex">
                        <a class="text-decoration-none text-dark" href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=<?php echo "$nombreAutor"; ?>">
                            <img class="img-fluid perfil-img" src="<?php echo $fotoAutor;?>" alt="Perfil del usuario" id="perfil-autor">
                        </a>
                    </div>
                    <div class="d-flex flex-column">
                        <a class="text-decoration-none text-dark" href="../CarpetaPerfil/Perfil.php?NombreDeUsuario=<?php echo "$nombreAutor"; ?>">
                            <span class="h4" id="nombre-usuario">
                                <?php echo "@$nombreAutor"; ?>
                            </span>
                            <small class="text-muted" id="pais-usuario">
                                <?php // echo $paisAutor; ?>
                            </small>
                        </a>
                    </div>  
                </div>

                    <div class="col  d-flex justify-content-end mt-lg-2">
                        <!-- <span class="text-muted d-flex flex-column"> -->
                        <small class="text-muted">
                                <?php echo explode(" ", (new DateTime($fecha))->format('d/m/Y'))[0]; ?>
                        </small>
                            <small>
                                <?php // echo substr(explode(" ", $fecha)[1], 0, 5); ?>
                            </small>
                        <!--  </span> -->
                    </div>
                </div>
            </div>

            <div class="datos-receta row d-flex">
                <div class="col-lg-6  d-flex flex-column justify-content-start mb-md-5">
                <?php
                if (!empty($imagenes)) {
                    // portada
                    echo '<div class="ms-md-4 ms-3 contenedor-img-portada">';
                    echo '<a href="#!" data-bs-toggle="modal" data-bs-target="#modalImagen">'; 
                    echo '<img src="' . $imagenes[0]. '" alt="Receta" class="img-portada portada-receta rounded img-fluid" id="portada-receta">';
                    echo '</a>';
                    echo '</div>';

                    if (count($imagenes) > 1) {
                        // demás imágenes con desplazamiento horizontal
                        echo '<div class="w-75 d-flex ms-md-4 ms-3 scroll">';
                        echo '<div class="contenedor-imagenes d-flex">';
                        for ($i = 1; $i < count($imagenes); $i++) {
                            echo '<img src="' . $imagenes[$i]. '" alt="Receta" class="rounded img-fluid me-1 my-2 imagen">';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'No hay portada';
                }
                ?>



                </div>

                <div class="content-info col-lg-6  my-5 d-flex flex-column justify-content-end">
                    <div class="ms-md-4 ms-3">
                        <h1 class="titulo-receta">
                            <?php echo $titulo; ?>
                        </h1>
                        <p>
                            <?php echo $descripcion; ?>
                        </p>
                        <div class="mb-3">
                            <?php
                            if (!empty($etiquetas)) {
                                foreach ($etiquetas as $etiqueta) {
                                //#=pagina de etiquetas o a buscador
                                    echo '<a class="etiqueta text-decoration-none" href="#">' . $etiqueta["titulo"] . '</a> ';
                                }
                            } else {
                                echo 'No hay etiquetas';
                            }
                            ?>
                            
                        </div>
                        <a class="text-decoration-none" href="#">   
                            <p class="categoria-style d-inline-flex mb-3 fw-semibold border border-success-subtle rounded-5">
                                    <?php echo $categoriaTitulo; ?>
                            </p>
                        </a>

                    </div>

                    <div class="mt-3 d-flex flex-row justify-content-between">

                        <div class="acciones my-2 ms-md-4 ms-3">

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

    <div class="contenedor-detalles container text-center w-75 mt-5">
        <div class="row align-items-start">
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <!-- pais -->
                    <?php
                    if (!empty($paises)) {
                        foreach ($paises as $pais) {
                            echo '<img src="../svg/' . $pais["ruta_imagen_pais"] . '" alt="Bandera" width="35" class="bandera" id="bandera-receta"> ';
                           // echo '<p>'.$pais["nombre"].'</p>';
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
                    <h6>Dificultad</h6>
                    <p id="dificultadRecetaDB" class="dificultad">
                        <?php echo $dificultad; ?>
                    </p>
                </div>
            </div>
            <div class="col-4">
                <div class="align-items-center box-icons">
                    <img src="../svg/alarm.svg" width="25px" class="icono-item" alt="Dificultad icon">
                    <h6>Tiempo</h6>
                    <p id="tiempoRecetaDB" class="tiempo">
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
                        <div class="imagenes-pasos row mt-2 w-75">
                            <?php foreach ($paso['imagenes'] as $imagenPaso): ?>
                                <div class="col-md-6 mb-2 contenedor-paso-img">
                                    <img src="<?php echo $imagenPaso; ?>" class="img-fluid img-paso" alt="Imagen del paso">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 order-md-1 order-1">
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

        <div class="col-md-4 order-md-2 order-2 mt-4 mt-md-0">
            <div class="valoraciones w-100 text-center">
                <h5 id="numPromedioValoraciones"></h5>
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
    </div>
</div>


    <!-- MODAL PARA VER IMAGENES DE LA GALERIA -->
    <div tabindex="-1" aria-labelledby="modalImagenLabel" aria-hidden="true" class="modal fade p-0" id="modalImagen">                        
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-imagen ">
                <?php echo '<img src="' . $imagenes[0]. '" alt="Receta">'; ?>                
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
                        <input type="hidden" id="ComentarioID" name="ComentarioID" value=""/>
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
                                        echo '<option value='.$razon['id_razon'].'>'.$razon['descripcion'].'</option>';
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

    <!-- TOAST PARA NOTIFICAR MENSAJES DE ÉXITO -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">

        <div id="formToastSuccess" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div  id="toast-success-msg" class="toast-body">
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
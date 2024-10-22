<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/iniciarSesion.php"); 
    exit();
}
$id_usuario = $_SESSION['id'];

//seccion en la que obtenemos la url actual.
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";      
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$currentUrl = $scheme . "://" . $host . $requestUri;
$indexPosition = strpos($currentUrl, 'CarpetaFavoritos');
$urlVariable = '';

if ($indexPosition !== false) {
    $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaFavoritos'));
} else {

    $indexPosition = strpos($currentUrl, 'CarpetaFavoritos/');
    if ($indexPosition !== false) {
        $urlVariable = substr($currentUrl, 0, $indexPosition + strlen('CarpetaFavoritos/'));
    } else {
        // Fallback: usar el esquema y host si no se encuentran patrones
        $urlVariable = $scheme . "://" . $host . '/';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>
        
        
        <link rel="stylesheet" href="./EstilosFavoritos.css">
        <script src="./JSFavoritos.js" defer></script>
        
        <?php include '../includes/head.php'?>
        
    </head>
    
<body data-IDUsuario="<?php echo htmlspecialchars($id_usuario); ?>" data-urlbase="<?php echo htmlspecialchars($urlVariable); ?>">
    
<?php include '../includes/header.php' ?>
<?php include '../includes/conec_db.php' ?>

<div class="p-3">
    <p class="fs-1 d-inline" >Recetas Favoritas</p>
    <p class="d-inline fs-4" id="IDCantidadPublicaciones"></p>
</div>
<hr>
<br>
    <div class="container-fluid row" id="IDContenedorPublicacionesFavoritas">

    </div>











<!---
<div class="container-fluid row">

    <div class="col-1 "></div>

    <div class=" col-10 BoxPublicacion p-0">
        <div class="card" >
            <div class=" DivEncabezadoPublicacion ">
                <img class="d-inline " alt="Texto si no ve imagen" src="../images/bondiola_lp.jpg"width="25" height="25">
                <p class="d-inline" id="IDNombreCompletoDeUsuarioEnPublicacion">Nombre & Apellido de Usuario</p>
                <p class="d-inline text-secondary" id="IDNombreDeUsuarioEnPublicacion">@NombreDeUsuario</p>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide carouselPerfil">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    
                </div>
                <div class="carousel-inner"> 
                    <div class="carousel-item active slide" data-background-image="../images/milanesas_lp.jpg">
                        <img src="../images/milanesas_lp.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item slide" data-background-image="../images/panchos_lp.jpeg">
                        <img src="../images/panchos_lp.jpeg" class="d-block w-100 " alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            

            <div class="card-body ">
                <h5 class="card-title ">Titulo Publicacion</h5>
                <p class="card-text">Descripcion...................</p>
                <p class="card-text">Descripcion...................</p>
                <p class="card-text">Descripcion...................</p>
                <p class="card-text">Descripcion...................</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text EstilosCategorias">Categoria</p>
                    <p class="card-text EstilosEstiquetas">Estiqueta1</p>
                    <p class="card-text EstilosEstiquetas">Estiqueta2</p>
                    <p class="card-text EstilosEstiquetas">Estiqueta3</p>
                    <p class="card-text EstilosEstiquetas">Estiqueta4</p>
                    <p class="card-text EstilosEstiquetas">Estiqueta5</p>
                </li>
                <li class="list-group-item">
                    <ul>
                        <li><p class="card-text">Ingrediente</p></li>
                        <li><p class="card-text">Ingrediente</p></li>
                        <li><p class="card-text">Ingrediente</p></li>
                        <li><p class="card-text">Ingrediente</p></li>
                    </ul>
                </li>
            </ul>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="valoracion">
                        <p>Valoración: ★★★★☆ (32 valoraciones)</p>
                    </div>
                    

                    <div class="comentarios">
                        <p>10 comentarios</p>
                    </div>
                </div>
                

                <div class="d-flex justify-content-end mt-2">

                    <button class="btn btn-outline-primary me-2" type="button">
                        Compartir
                    </button>
            
                    
                    <button class="btn btn btn-outline-dark boton-quitar" type="button">
                        Quitar de Favoritos
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    <div class="col-1 "></div>

</div>-->

<br>
<br>
<div>
    <?php include '../includes/footer.php'?>  
</div>
</body>
</html>

<!--







---->
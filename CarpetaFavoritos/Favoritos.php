<?php include '../includes/header.php'?>
<!---supongo que como un titulo que indique que estas en las recetas favoritas y depues ya las 
publicaciones en si.
posible filtro para mostrar recetas?-->

<p class="fs-1 d-inline mt-0">Recetas Favoritas</p>
<p class="d-inline fs-4">(cantidad)</p>

<br>
<hr>
<br>
<div class="container-fluid row ">
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
                <div class="carousel-inner"> <!---buscar manera para que el tamaño de una imagen no perjudique la UX-->
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
                    <!-- Valoración y cantidad de valoraciones -->
                    <div class="valoracion">
                        <p>Valoración: ★★★★☆ (32 valoraciones)</p>
                    </div>
                    
                    <!-- Cantidad de comentarios -->
                    <div class="comentarios">
                        <p>10 comentarios</p>
                    </div>
                </div>
                
                <!-- Botones de acción -->
                <div class="d-flex justify-content-end mt-2">
                    <!-- Botón para compartir -->
                    <button class="btn btn-outline-primary me-2" type="button">
                        Compartir
                    </button>
            
                    <!-- Botón para guardar en favoritos -->
                    <button class="btn btn btn-outline-dark boton-quitar" type="button">
                        Quitar de Favoritos
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    <div class="col-1 "></div>

</div>
<br>
<hr>
<br>
    <div class="container-fluid row ">
        <div class="col-1 "></div>

        <div class=" col-10 BoxPublicacion p-0">
            <div class="card" >
                <div class=" DivEncabezadoPublicacion ">
                    <img class="d-inline " alt="Texto si no ve imagen" src="../images/bondiola_lp.jpg"width="25" height="25">
                    <p class="d-inline" id="IDNombreCompletoDeUsuarioEnPublicacion">Nombre & Apellido de Usuario</p>
                    <p class="d-inline text-secondary" id="IDNombreDeUsuarioEnPublicacion">@NombreDeUsuario</p>
                </div>

                <div id="carouselExampleIndicators1" class="carousel slide ">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        
                    </div>
                    <div class="carousel-inner slide"> <!---buscar manera para que el tamaño de una imagen no perjudique la UX-->
                        <div class="carousel-item active slide" data-background-image="../images/panchos_lp.jpeg">
                            <img src="../images/panchos_lp.jpeg"  class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item slide" data-background-image="../images/pizza_lp.jpg">
                            <img src="../images/pizza_lp.jpg" class="d-block w-100 " alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
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
                        <!-- Valoración y cantidad de valoraciones -->
                        <div class="valoracion">
                            <p>Valoración: ★★★★☆ (32 valoraciones)</p>
                        </div>
                        
                        <!-- Cantidad de comentarios -->
                        <div class="comentarios">
                            <p>10 comentarios</p>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-end mt-2">
                        <!-- Botón para compartir -->
                        <button class="btn btn-outline-primary me-2" type="button">
                            Compartir
                        </button>
                
                        <!-- Botón para guardar en favoritos -->
                        <button class="btn btn btn-outline-dark boton-quitar" type="button">
                            Quitar de Favoritos
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-1 "></div>

    </div>

<?php include '../includes/footer.php'?>
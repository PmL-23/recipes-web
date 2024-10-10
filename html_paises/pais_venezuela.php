<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Venezuela</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <h2 class="text-center pt-5">Las mejores recetas de Venezuela</h2>
<!-- Barra de navegación secundaria -->
<nav class="menu-barra pt-4">
    <div class="menu-toggle" id="menuToggle">☰</div>
    <ul class="menu-list">
        <li><a id="todos" href="#todos">Todos</a></li>
        <li><a id="desayuno" href="#desayuno">Desayuno</a></li>
        <li><a id="almuerzo" href="#almuerzo">Almuerzo</a></li>
        <li><a id="merienda" href="#merienda">Merienda</a></li>
        <li><a id="cena" href="#cena">Cena</a></li>
    </ul>
</nav>
    <!-- Sección de recetas -->
    
    <!-- Recetas Venezolanas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Arepas.jpg" class="card-img-top" alt="arepas">
                    <div class="card-body">
                        <h5 class="card-title">Arepas</h5>
                        <p class="card-text">Deliciosas arepas de maíz, rellenas de queso, carne o pollo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArepas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Cachapas.jpg" class="card-img-top" alt="cachapas">
                    <div class="card-body">
                        <h5 class="card-title">Cachapas</h5>
                        <p class="card-text">Tortas de maíz tierno, servidas con queso fresco.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCachapas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Perico.jpg" class="card-img-top" alt="perico">
                    <div class="card-body">
                        <h5 class="card-title">Perico</h5>
                        <p class="card-text">Huevos revueltos con tomate y cebolla, perfectos para acompañar arepas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPerico">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Tostadas de Pan de Jamón.jpg" class="card-img-top" alt="tostadas de pan de jamon">
                    <div class="card-body">
                        <h5 class="card-title">Tostadas de Pan de Jamón</h5>
                        <p class="card-text">Rebanadas de pan de jamón, perfectas para el desayuno navideño.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanJamon">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Quesillo.jpg" class="card-img-top" alt="quesillo">
                    <div class="card-body">
                        <h5 class="card-title">Quesillo</h5>
                        <p class="card-text">Flan de leche condensada, un postre dulce y cremoso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalQuesillo">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Bollos de maíz.jpg" class="card-img-top" alt="bollos de maiz">
                    <div class="card-body">
                        <h5 class="card-title">Bollos de maíz</h5>
                        <p class="card-text">Bollos hechos con masa de maíz, ideales para acompañar con queso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBollosMaiz">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pabellón Criollo.jpg" class="card-img-top" alt="pabellon criollo">
                    <div class="card-body">
                        <h5 class="card-title">Pabellón Criollo</h5>
                        <p class="card-text">Arroz, carne mechada, caraotas y plátano frito, un plato emblemático.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPabellon">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Hallacas.jpg" class="card-img-top" alt="hallacas">
                    <div class="card-body">
                        <h5 class="card-title">Hallacas</h5>
                        <p class="card-text">Tamales rellenos de carne, pollo y aceitunas, un plato navideño.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalHallacas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Asado Negro.jpg" class="card-img-top" alt="asado negro">
                    <div class="card-body">
                        <h5 class="card-title">Asado Negro</h5>
                        <p class="card-text">Carne de res cocida a fuego lento, con una deliciosa salsa oscura.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAsadoNegro">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Sancocho.jpg" class="card-img-top" alt="sancocho">
                    <div class="card-body">
                        <h5 class="card-title">Sancocho</h5>
                        <p class="card-text">Sopa espesa de carne y verduras, ideal para compartir.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSancocho">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pollo Guisado.jpg" class="card-img-top" alt="pollo guisado">
                    <div class="card-body">
                        <h5 class="card-title">Pollo Guisado</h5>
                        <p class="card-text">Pollo cocido a fuego lento con especias y vegetales.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloGuisado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Polvorosa de Pollo.jpg" class="card-img-top" alt="polvorosa de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Polvorosa de Pollo</h5>
                        <p class="card-text">Pastel salado con masa crujiente y un delicioso relleno de pollo y especias.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolvorosa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Galletas de Arequipe.jpg" class="card-img-top" alt="galletas de arequipe">
                    <div class="card-body">
                        <h5 class="card-title">Galletas de Arequipe</h5>
                        <p class="card-text">Deliciosas galletas rellenas de dulce de leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalGalletasArequipe">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Torticas de Plátano.jpg" class="card-img-top" alt="torticas de platano">
                    <div class="card-body">
                        <h5 class="card-title">Torticas de Plátano</h5>
                        <p class="card-text">Pequeñas tortas de plátano, crujientes.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTorticasPlatano">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Torta de Pan.jpg" class="card-img-top" alt="torta de pan">
                    <div class="card-body">
                        <h5 class="card-title">Torta de Pan</h5>
                        <p class="card-text">Postre a base de pan, leche y canela.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortaPan">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Dulce de Lechosa.jpg" class="card-img-top" alt="dulce de lechosa">
                    <div class="card-body">
                        <h5 class="card-title">Dulce de Lechosa</h5>
                        <p class="card-text">Dulce hecho de papaya, cocido en almíbar.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalDulceLechosa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Papelón con Limón.jpg" class="card-img-top" alt="papelon con limon">
                    <div class="card-body">
                        <h5 class="card-title">Papelón con Limón</h5>
                        <p class="card-text">Bebida refrescante de papelón y limón.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPapelonLimon">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Cocada.jpg" class="card-img-top" alt="cocada">
                    <div class="card-body">
                        <h5 class="card-title">Cocada</h5>
                        <p class="card-text">Bebida dulce a base de coco y leche.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCocada">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pasta al Pesto.jpg" class="card-img-top" alt="pasta al pesto">
                    <div class="card-body">
                        <h5 class="card-title">Pasta al Pesto</h5>
                        <p class="card-text">Deliciosa pasta con salsa pesto, una opción ligera para la cena.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastaAlPesto">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Ensalada de Quinoa.jpg" class="card-img-top" alt="ensalada de quinoa">
                    <div class="card-body">
                        <h5 class="card-title">Ensalada de Quinoa</h5>
                        <p class="card-text">Ensalada fresca de quinoa con verduras, ideal para una cena saludable.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEnsaladaDeQuinoa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pollo Asado.jpg" class="card-img-top" alt="pollo asado">
                    <div class="card-body">
                        <h5 class="card-title">Pollo Asado</h5>
                        <p class="card-text">Pollo marinado y asado al horno, un plato fácil y sabroso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pescado a la Plancha.jpg" class="card-img-top" alt="pescado a la plancha">
                    <div class="card-body">
                        <h5 class="card-title">Pescado a la Plancha</h5>
                        <p class="card-text">Pescado fresco a la plancha, servido con vegetales al vapor.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPescadoPlancha">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Pastel de chucho.jpg" class="card-img-top" alt="pastel de chucho">
                    <div class="card-body">
                        <h5 class="card-title">Pastel de Chucho</h5>
                        <p class="card-text">Pastel de plátano maduro con capas de pescado salado y salsa bechamel.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPastelDeChucho">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgVenezuela/Empanadas Andinas.jpg" class="card-img-top" alt="empanadas andinas">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas Andinas</h5>
                        <p class="card-text">Empanadas crujientes rellenas de carne o queso, típicas de los Andes venezolanos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasAndinas">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Modal Arepas -->
<div class="modal" id="modalArepas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arepas</h2>
        <p id="descripcionReceta">Deliciosas arepas de maíz, rellenas de queso, carne o pollo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Harina de maíz</li>
            <li>Agua</li>
            <li>Sal</li>
            <li>Queso, carne o pollo para el relleno</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina de maíz con agua y sal para formar una masa.</li>
            <li>Formar bolas y aplastarlas en forma de arepas.</li>
            <li>Cocinar en una sartén hasta que estén doradas por ambos lados.</li>
            <li>Rellenar con queso, carne o pollo.</li>
        </ol>
    </div>
</div>

<!-- Modal Cachapas -->
<div class="modal" id="modalCachapas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cachapas</h2>
        <p id="descripcionReceta">Tortas de maíz tierno, servidas con queso fresco.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Maíz tierno molido</li>
            <li>Leche</li>
            <li>Azúcar</li>
            <li>Queso fresco</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el maíz molido con leche y azúcar.</li>
            <li>Cocinar la mezcla en una sartén como si fueran pancakes.</li>
            <li>Servir con queso fresco por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Perico -->
<div class="modal" id="modalPerico">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Perico</h2>
        <p id="descripcionReceta">Huevos revueltos con tomate y cebolla, perfectos para acompañar arepas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Huevos</li>
            <li>Tomate</li>
            <li>Cebolla</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el tomate y la cebolla en trozos pequeños.</li>
            <li>Sofreír el tomate y la cebolla hasta que estén blandos.</li>
            <li>Añadir los huevos y revolver hasta que estén cocidos.</li>
            <li>Salpimentar al gusto y servir con arepas.</li>
        </ol>
    </div>
</div>

<!-- Modal Tostadas de Pan de Jamón -->
<div class="modal" id="modalPanJamon">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tostadas de Pan de Jamón</h2>
        <p id="descripcionReceta">Rebanadas de pan de jamón, perfectas para el desayuno navideño.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pan de jamón (preparado previamente)</li>
            <li>Mantequilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el pan de jamón en rebanadas.</li>
            <li>Untar con mantequilla y tostar en una sartén.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Quesillo -->
<div class="modal" id="modalQuesillo">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Quesillo</h2>
        <p id="descripcionReceta">Flan de leche condensada, un postre dulce y cremoso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Leche condensada</li>
            <li>Huevos</li>
            <li>Vainilla</li>
            <li>Azúcar para el caramelo</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar un caramelo con azúcar y verterlo en el fondo de un molde.</li>
            <li>Mezclar la leche condensada con los huevos y la vainilla.</li>
            <li>Verter la mezcla en el molde y cocinar al baño maría.</li>
            <li>Dejar enfriar antes de desmoldar.</li>
        </ol>
    </div>
</div>

<!-- Modal Bollos de Maíz -->
<div class="modal" id="modalBollosMaiz">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Bollos de Maíz</h2>
        <p id="descripcionReceta">Bollos hechos con masa de maíz, ideales para acompañar con queso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Masa de maíz</li>
            <li>Hojas de maíz</li>
            <li>Queso fresco</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Formar bollos con la masa de maíz.</li>
            <li>Envolver los bollos en hojas de maíz.</li>
            <li>Cocinar al vapor hasta que estén cocidos.</li>
            <li>Servir con queso fresco.</li>
        </ol>
    </div>
</div>

<!-- Modal Pabellón Criollo -->
<div class="modal" id="modalPabellon">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pabellón Criollo</h2>
        <p id="descripcionReceta">Arroz, carne mechada, caraotas y plátano frito, un plato emblemático.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Arroz</li>
            <li>Carne mechada</li>
            <li>Caraotas negras</li>
            <li>Plátano frito</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el arroz y las caraotas por separado.</li>
            <li>Preparar la carne mechada con tomate, cebolla y especias.</li>
            <li>Freír los plátanos hasta que estén dorados.</li>
            <li>Servir todo junto en un plato.</li>
        </ol>
    </div>
</div>

<!-- Modal Hallacas -->
<div class="modal" id="modalHallacas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Hallacas</h2>
        <p id="descripcionReceta">Tamales rellenos de carne, pollo y aceitunas, un plato navideño.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Harina de maíz</li>
            <li>Carne de res</li>
            <li>Pollo</li>
            <li>Aceitunas</li>
            <li>Hojas de plátano</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar la masa de maíz.</li>
            <li>Rellenar la masa con carne, pollo y aceitunas.</li>
            <li>Envolver las hallacas en hojas de plátano.</li>
            <li>Cocinar en agua hirviendo.</li>
        </ol>
    </div>
</div>

<!-- Modal Asado Negro -->
<div class="modal" id="modalAsadoNegro">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Asado Negro</h2>
        <p id="descripcionReceta">Carne de res cocida a fuego lento, con una deliciosa salsa oscura.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Carne de res</li>
            <li>Cebolla</li>
            <li>Papelón (panela de azúcar)</li>
            <li>Vino tinto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Dorar la carne en una olla.</li>
            <li>Agregar cebolla, papelón y vino tinto.</li>
            <li>Cocinar a fuego lento hasta que la carne esté tierna.</li>
            <li>Servir con la salsa oscura por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Sancocho -->
<div class="modal" id="modalSancocho">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sancocho</h2>
        <p id="descripcionReceta">Sopa espesa de carne y verduras, ideal para compartir.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Carne de res o pollo</li>
            <li>Yuca</li>
            <li>Plátano verde</li>
            <li>Zanahoria</li>
            <li>Maíz</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar la carne hasta que esté tierna.</li>
            <li>Agregar las verduras y cocinar hasta que estén suaves.</li>
            <li>Ajustar la sazón y servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pollo Guisado -->
<div class="modal" id="modalPolloGuisado">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pollo Guisado</h2>
        <p id="descripcionReceta">Pollo cocido a fuego lento con especias y vegetales.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pollo</li>
            <li>Tomate</li>
            <li>Cebolla</li>
            <li>Pimientos</li>
            <li>Especias al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Dorar el pollo en una olla.</li>
            <li>Agregar tomate, cebolla, pimientos y especias.</li>
            <li>Cocinar a fuego lento hasta que el pollo esté tierno.</li>
            <li>Servir con arroz o papas.</li>
        </ol>
    </div>
</div>

<!-- Modal Polvorosa de Pollo -->
<div class="modal" id="modalPolvorosa">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Polvorosa de Pollo</h2>
        <p id="descripcionReceta">Pastel salado con masa crujiente y un delicioso relleno de pollo y especias.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Pollo</li>
            <li>Cebolla</li>
            <li>Pimientos</li>
            <li>Harina</li>
            <li>Mantequilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar la masa con harina y mantequilla.</li>
            <li>Saltear el pollo con cebolla y pimientos.</li>
            <li>Rellenar la masa con el pollo y las verduras.</li>
            <li>Hornear hasta que la masa esté dorada.</li>
        </ol>
    </div>
</div>

<!-- Modal Galletas de Arequipe -->
<div class="modal" id="modalGalletasArequipe">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Galletas de Arequipe</h2>
        <p id="descripcionReceta">Deliciosas galletas rellenas de dulce de leche.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina</li>
            <li>1 taza de mantequilla</li>
            <li>1 taza de azúcar</li>
            <li>1 taza de arequipe (dulce de leche)</li>
            <li>1 cucharadita de vainilla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la mantequilla con el azúcar hasta obtener una mezcla cremosa.</li>
            <li>Agregar la harina y la vainilla, mezclando bien.</li>
            <li>Formar pequeñas bolitas con la masa y hornear a 180°C por 15 minutos.</li>
            <li>Una vez listas, rellenar las galletas con el arequipe.</li>
        </ol>
    </div>
</div>

<!-- Modal Torticas de Plátano -->
<div class="modal" id="modalTorticasPlatano">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Torticas de Plátano</h2>
        <p id="descripcionReceta">Pequeñas tortas de plátano, crujientes.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>3 plátanos maduros</li>
            <li>2 huevos</li>
            <li>1 taza de harina</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Machacar los plátanos hasta formar un puré.</li>
            <li>Mezclar los plátanos con los huevos y la harina.</li>
            <li>Formar pequeñas tortitas y freír en aceite caliente hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Torta de Pan -->
<div class="modal" id="modalTortaPan">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Torta de Pan</h2>
        <p id="descripcionReceta">Postre a base de pan, leche y canela.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>5 rebanadas de pan</li>
            <li>2 tazas de leche</li>
            <li>1 taza de azúcar</li>
            <li>Canela al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Remojar el pan en la leche.</li>
            <li>Mezclar el azúcar y la canela con la mezcla de pan.</li>
            <li>Hornear a 180°C durante 30 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Dulce de Lechosa -->
<div class="modal" id="modalDulceLechosa">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Dulce de Lechosa</h2>
        <p id="descripcionReceta">Dulce hecho de papaya, cocido en almíbar.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 papaya verde</li>
            <li>1 taza de azúcar</li>
            <li>2 tazas de agua</li>
            <li>Clavos de olor al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelar y cortar la papaya en tiras finas.</li>
            <li>Hervir el agua con el azúcar y los clavos de olor.</li>
            <li>Agregar la papaya y cocinar a fuego lento hasta que esté suave.</li>
        </ol>
    </div>
</div>

<!-- Modal Papelón con Limón -->
<div class="modal" id="modalPapelonLimon">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Papelón con Limón</h2>
        <p id="descripcionReceta">Bebida refrescante de papelón y limón.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 panela de papelón</li>
            <li>2 litros de agua</li>
            <li>Jugo de 4 limones</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Disolver el papelón en agua tibia.</li>
            <li>Agregar el jugo de limón y mezclar bien.</li>
            <li>Servir frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Cocada -->
<div class="modal" id="modalCocada">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Cocada</h2>
        <p id="descripcionReceta">Bebida dulce a base de coco y leche.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 coco rallado</li>
            <li>1 taza de leche condensada</li>
            <li>2 tazas de leche</li>
            <li>Hielo al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Licuar el coco con la leche y la leche condensada.</li>
            <li>Agregar hielo y licuar nuevamente.</li>
            <li>Servir frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Pasta al Pesto -->
<div class="modal" id="modalPastaAlPesto">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pasta al Pesto</h2>
        <p id="descripcionReceta">Deliciosa pasta con salsa pesto, una opción ligera para la cena.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>400 g de pasta</li>
            <li>1 taza de albahaca fresca</li>
            <li>50 g de piñones</li>
            <li>100 ml de aceite de oliva</li>
            <li>50 g de queso parmesano</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la pasta según las instrucciones del paquete.</li>
            <li>En un procesador, mezclar la albahaca, piñones, aceite y queso hasta formar una salsa.</li>
            <li>Mezclar la pasta cocida con la salsa y servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Ensalada de Quinoa -->
<div class="modal" id="modalEnsaladaDeQuinoa">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ensalada de Quinoa</h2>
        <p id="descripcionReceta">Ensalada fresca de quinoa con verduras, ideal para una cena saludable.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de quinoa</li>
            <li>2 tazas de agua</li>
            <li>1 pimiento rojo, picado</li>
            <li>1 pepino, picado</li>
            <li>1 taza de maíz dulce</li>
            <li>Jugo de 1 limón</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la quinoa en agua hasta que esté tierna.</li>
            <li>Mezclar la quinoa cocida con las verduras y aliñar con jugo de limón.</li>
            <li>Servir fría o a temperatura ambiente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pollo Asado -->
<div class="modal" id="modalPolloAsado">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pollo Asado</h2>
        <p id="descripcionReceta">Pollo marinado y asado al horno, un plato fácil y sabroso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pollo entero</li>
            <li>2 cucharadas de aceite de oliva</li>
            <li>1 limón</li>
            <li>1 cucharada de pimentón</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el pollo con aceite, limón, pimentón, sal y pimienta.</li>
            <li>Asar en horno precalentado a 180°C durante 1 hora o hasta dorar.</li>
            <li>Dejar reposar y servir con guarnición al gusto.</li>
        </ol>
    </div>
</div>

<!-- Modal Pescado a la Plancha -->
<div class="modal" id="modalPescadoPlancha">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pescado a la Plancha</h2>
        <p id="descripcionReceta">Pescado fresco a la plancha, servido con vegetales al vapor.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 filetes de pescado</li>
            <li>1 limón</li>
            <li>Sal y pimienta al gusto</li>
            <li>Verduras al vapor (brócoli, zanahoria, etc.)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Condimentar el pescado con sal, pimienta y jugo de limón.</li>
            <li>Cocinar en una plancha caliente por 3-4 minutos de cada lado.</li>
            <li>Servir con las verduras al vapor.</li>
        </ol>
    </div>
</div>

<!-- Modal Pastel de Chucho -->
<div class="modal" id="modalPastelDeChucho">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pastel de Chucho</h2>
        <p id="descripcionReceta">Pastel de plátano maduro con capas de pescado salado y salsa bechamel.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>3 plátanos maduros</li>
            <li>200 g de pescado salado</li>
            <li>1 taza de salsa bechamel</li>
            <li>Queso rallado</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer y triturar los plátanos.</li>
            <li>Mezclar el pescado desmenuzado con la salsa bechamel.</li>
            <li>En un molde, alternar capas de puré de plátano y la mezcla de pescado.</li>
            <li>Hornear a 180°C durante 30 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanadas Andinas -->
<div class="modal" id="modalEmpanadasAndinas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Empanadas Andinas</h2>
        <p id="descripcionReceta">Empanadas crujientes rellenas de carne o queso, típicas de los Andes venezolanos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>1 taza de agua caliente</li>
            <li>500 g de carne molida o queso</li>
            <li>Sal al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la harina con agua y sal hasta formar una masa.</li>
            <li>Rellenar las empanadas con carne o queso.</li>
            <li>Freír en aceite caliente hasta dorar.</li>
        </ol>
    </div>
</div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
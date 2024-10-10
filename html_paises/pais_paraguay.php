<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paraguay</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <h2 class="text-center pt-5">Las mejores recetas de Paraguay</h2>
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
    
    <!-- Recetas Paraguayas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Mbejú.jpg" class="card-img-top" alt="mbeju">
                    <div class="card-body">
                        <h5 class="card-title">Mbejú</h5>
                        <p class="card-text">Tortilla de almidón de mandioca, queso y grasa de cerdo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMbeju">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Chipa.jpg" class="card-img-top" alt="chipa">
                    <div class="card-body">
                        <h5 class="card-title">Chipa</h5>
                        <p class="card-text">Panecillo de almidón de mandioca, queso y huevo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChipa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Sopa Paraguaya.jpg" class="card-img-top" alt="sopa paraguaya">
                    <div class="card-body">
                        <h5 class="card-title">Sopa Paraguaya</h5>
                        <p class="card-text">Una especie de pan de maíz, con queso y cebolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaParaguaya">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Kivevé.jpg" class="card-img-top" alt="kiveve">
                    <div class="card-body">
                        <h5 class="card-title">Kivevé</h5>
                        <p class="card-text">Guiso espeso de zapallo, queso y harina de maíz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalKiveve">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Ka'í Ladrillo.jpeg" class="card-img-top" alt="ka'í ladrillo">
                    <div class="card-body">
                        <h5 class="card-title">Ka'í Ladrillo</h5>
                        <p class="card-text">Dulce hecho a base de maní, miel y azúcar, para acompañar el mate cocido.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalKaiLadrillo">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Tortilla de Mandioca.jpg" class="card-img-top" alt="tortilla de mandioca">
                    <div class="card-body">
                        <h5 class="card-title">Tortilla de Mandioca</h5>
                        <p class="card-text">Tortilla hecha con mandioca hervida y frita con huevos.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTortillaDeMandioca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Asado a la Paraguaya.jpg" class="card-img-top" alt="asado a la paraguaya">
                    <div class="card-body">
                        <h5 class="card-title">Asado a la Paraguaya</h5>
                        <p class="card-text">Carne a la parrilla con mandioca cocida, un clásico de los asados en Paraguay.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAsado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Vorí Vorí.jpg" class="card-img-top" alt="vori vori">
                    <div class="card-body">
                        <h5 class="card-title">Vorí Vorí</h5>
                        <p class="card-text">Sopa con bolitas de maíz y queso, acompañada de pollo o carne.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalVoriVori">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Pira Caldo.jpg" class="card-img-top" alt="pira caldo">
                    <div class="card-body">
                        <h5 class="card-title">Pira Caldo</h5>
                        <p class="card-text">Sopa de pescado, cocido en un caldo con verduras ideal para el almuerzo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPiraCaldo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Chipa Guasu.jpg" class="card-img-top" alt="chipa guasu">
                    <div class="card-body">
                        <h5 class="card-title">Chipa Guasu</h5>
                        <p class="card-text">Guiso de choclo con queso, acompañamiento ideal para carnes.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChipaGuasu">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Soyo.jpg" class="card-img-top" alt="soyo">
                    <div class="card-body">
                        <h5 class="card-title">Soyo</h5>
                        <p class="card-text">Guiso de carne molida con verduras, típico paraguayo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSoyo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Arroz Kesu.jpg" class="card-img-top" alt="arroz kesu">
                    <div class="card-body">
                        <h5 class="card-title">Arroz Kesu</h5>
                        <p class="card-text">Arroz cremoso con queso, ideal como plato principal o acompañamiento.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozKesu">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Kosereva.jpg" class="card-img-top" alt="kosereva">
                    <div class="card-body">
                        <h5 class="card-title">Kosereva</h5>
                        <p class="card-text">Postre tradicional de Paraguay, hecho con cáscara de naranja agria.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalKosereva">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Mazamorra.jpg" class="card-img-top" alt="mazamorra">
                    <div class="card-body">
                        <h5 class="card-title">Mazamorra</h5>
                        <p class="card-text">Postre tradicional hecho de maíz blanco cocido en agua y miel negra.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMazamorra">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Payaguá Mascada.jpg" class="card-img-top" alt="payagua mascada">
                    <div class="card-body">
                        <h5 class="card-title">Payaguá Mascada</h5>
                        <p class="card-text">Croquetas de carne y mandioca hervida, fritas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPayaguaMascada">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Pan de Queso.jpg" class="card-img-top" alt="pan de queso">
                    <div class="card-body">
                        <h5 class="card-title">Pan de Queso</h5>
                        <p class="card-text">Pequeños panes de queso, suaves por dentro y crujientes por fuera.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanDeQueso">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Budín de Mandioca.jpg" class="card-img-top" alt="budin de mandioca">
                    <div class="card-body">
                        <h5 class="card-title">Budín de Mandioca</h5>
                        <p class="card-text">Delicioso budín hecho a base de mandioca, ideal para acompañar el té.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalBudinDeMandioca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Empanaditas de Viento.jpg" class="card-img-top" alt="empanaditas de viento">
                    <div class="card-body">
                        <h5 class="card-title">Empanaditas de Viento</h5>
                        <p class="card-text">Empanadas fritas ligeras, rellenas de queso o dulce.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanaditasDeViento">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Pollo al Horno con Mandioca.jpg" class="card-img-top" alt="pollo al horno con mandioca">
                    <div class="card-body">
                        <h5 class="card-title">Pollo al Horno con Mandioca</h5>
                        <p class="card-text">Pollo al horno acompañado de mandioca hervida o frita.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloAlHornoConMandioca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Milanesa de Carne con Puré.jpg" class="card-img-top" alt="milanesa de carne con pure">
                    <div class="card-body">
                        <h5 class="card-title">Milanesa de Carne con Puré</h5>
                        <p class="card-text">Clásica milanesa acompañada de puré de papas cremoso.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMilanesaDeCarneConPure">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Empanadas Paraguayas.jpg" class="card-img-top" alt="empanadas paraguayas">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas Paraguayas</h5>
                        <p class="card-text">Empanadas fritas de carne o pollo, típicas de la cena paraguaya.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasParaguayas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Guiso de Fideo.jpeg" class="card-img-top" alt="guiso de fideo">
                    <div class="card-body">
                        <h5 class="card-title">Guiso de Fideo</h5>
                        <p class="card-text">Guiso de fideos con carne y verduras, ideal para un almuerzo completo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalGuisoDeFideo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Sopa So'o.jpg" class="card-img-top" alt="sopa So'o">
                    <div class="card-body">
                        <h5 class="card-title">Sopa So'o</h5>
                        <p class="card-text">Versión de sopa paraguaya con carne picada dorada en horno.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSopaSoo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgParaguay/Empanadas de Carne.jpg" class="card-img-top" alt="empanadas de carne">
                    <div class="card-body">
                        <h5 class="card-title">Empanadas de Carne</h5>
                        <p class="card-text">Empanadas rellenas de carne sazonada, fritas o al horno, acompañadas con salsa picante.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalEmpanadasDeCarne">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Modal Mbejú -->
<div id="modalMbeju" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Mbejú</h2>
        <p id="descripcionReceta">Tortilla de almidón de mandioca, queso y grasa de cerdo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de almidón de mandioca</li>
            <li>1 taza de queso</li>
            <li>1/2 taza de grasa de cerdo</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el almidón de mandioca con la sal y el queso.</li>
            <li>Incorporar la grasa de cerdo derretida y formar una masa.</li>
            <li>Formar tortitas y cocinarlas en una sartén caliente hasta dorar.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Chipa -->
<div id="modalChipa" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Chipa</h2>
        <p id="descripcionReceta">Panecillo de almidón de mandioca, queso y huevo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de almidón de mandioca</li>
            <li>1 taza de queso rallado</li>
            <li>2 huevos</li>
            <li>1/2 taza de leche</li>
            <li>1/4 de taza de aceite</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta obtener una masa homogénea.</li>
            <li>Formar bolitas y colocarlas en una bandeja para hornear.</li>
            <li>Hornear a 180°C durante 25 minutos o hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Sopa Paraguaya -->
<div id="modalSopaParaguaya" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sopa Paraguaya</h2>
        <p id="descripcionReceta">Una especie de pan de maíz, con queso y cebolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de harina de maíz</li>
            <li>1 taza de leche</li>
            <li>1 taza de queso rallado</li>
            <li>1 cebolla picada</li>
            <li>3 huevos</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Rehogar la cebolla en un poco de aceite.</li>
            <li>Mezclar todos los ingredientes en un bol hasta obtener una mezcla homogénea.</li>
            <li>Verter en una fuente engrasada y hornear a 180°C durante 30-40 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Kivevé -->
<div id="modalKiveve" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Kivevé</h2>
        <p id="descripcionReceta">Guiso espeso de zapallo, queso y harina de maíz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de zapallo</li>
            <li>1 taza de queso</li>
            <li>1 taza de harina de maíz</li>
            <li>Sal al gusto</li>
            <li>Pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el zapallo hasta que esté tierno y hacer puré.</li>
            <li>Mezclar el puré con la harina, el queso, la sal y la pimienta.</li>
            <li>Cocinar a fuego lento hasta espesar, revolviendo constantemente.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Ka'í Ladrillo -->
<div id="modalKaiLadrillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ka'í Ladrillo</h2>
        <p id="descripcionReceta">Dulce hecho a base de maní, miel y azúcar, para acompañar el mate cocido.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>200 g de maní tostado</li>
            <li>100 g de azúcar</li>
            <li>50 g de miel</li>
            <li>1 pizca de sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Moler el maní y mezclarlo con el azúcar, la miel y la sal.</li>
            <li>Formar una masa y cortarla en bloques.</li>
            <li>Dejar secar antes de servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Tortilla de Mandioca -->
<div id="modalTortillaDeMandioca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tortilla de Mandioca</h2>
        <p id="descripcionReceta">Tortilla hecha con mandioca hervida y frita con huevos.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de mandioca hervida</li>
            <li>2 huevos</li>
            <li>1/2 taza de queso rallado</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hacer un puré con la mandioca hervida.</li>
            <li>Mezclar con los huevos, el queso y la sal.</li>
            <li>Cocinar en una sartén caliente hasta que esté dorada por ambos lados.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Asado a la Paraguaya -->
<div id="modalAsado" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Asado a la Paraguaya</h2>
        <p id="descripcionReceta">Carne a la parrilla con mandioca cocida, un clásico de los asados en Paraguay.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de carne (puede ser res o cerdo)</li>
            <li>Mandioca cocida al gusto</li>
            <li>Sal al gusto</li>
            <li>Opcional: adobos y especias al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar el fuego y asar la carne hasta el punto deseado.</li>
            <li>Servir con mandioca cocida y disfrutar.</li>
        </ol>
    </div>
</div>

<!-- Modal Vorí Vorí -->
<div id="modalVoriVori" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Vorí Vorí</h2>
        <p id="descripcionReceta">Sopa con bolitas de maíz y queso, acompañada de pollo o carne.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de maíz</li>
            <li>100 g de queso</li>
            <li>1 pollo troceado o carne</li>
            <li>Agua y sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el pollo o carne en agua con sal.</li>
            <li>Mezclar el maíz con agua hasta formar una masa y hacer bolitas.</li>
            <li>Agregar las bolitas a la sopa y cocinar hasta que floten.</li>
        </ol>
    </div>
</div>

<!-- Modal Pira Caldo -->
<div id="modalPiraCaldo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pira Caldo</h2>
        <p id="descripcionReceta">Sopa de pescado, cocido en un caldo con verduras ideal para el almuerzo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de pescado (puede ser surubí o otra variedad)</li>
            <li>Verduras al gusto (zanahoria, cebolla, etc.)</li>
            <li>Sal y pimienta al gusto</li>
            <li>Agua</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el pescado en agua con las verduras y especias.</li>
            <li>Servir caliente con arroz o solo.</li>
        </ol>
    </div>
</div>

<!-- Modal Chipa Guasu -->
<div id="modalChipaGuasu" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Chipa Guasu</h2>
        <p id="descripcionReceta">Guiso de choclo con queso, acompañamiento ideal para carnes.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 tazas de choclo desgranado</li>
            <li>200 g de queso</li>
            <li>4 huevos</li>
            <li>1 taza de leche</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta obtener una masa.</li>
            <li>Verter en un molde y hornear a 180°C hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Soyo -->
<div id="modalSoyo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Soyo</h2>
        <p id="descripcionReceta">Guiso de carne molida con verduras, típico paraguayo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de carne molida</li>
            <li>1 cebolla picada</li>
            <li>1 pimiento picado</li>
            <li>Verduras al gusto (zanahoria, arvejas, etc.)</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Sofreír la cebolla y pimiento hasta dorar.</li>
            <li>Añadir la carne y cocinar hasta dorar.</li>
            <li>Agregar las verduras y cocinar hasta que estén tiernas.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz Kesu -->
<div id="modalArrozKesu" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz Kesu</h2>
        <p id="descripcionReceta">Arroz cremoso con queso, ideal como plato principal o acompañamiento.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de arroz</li>
            <li>100 g de queso</li>
            <li>4 tazas de agua o caldo</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el arroz en agua o caldo con sal.</li>
            <li>Agregar el queso al final y mezclar hasta derretir.</li>
        </ol>
    </div>
</div>

<!-- Modal Kosereva -->
<div class="modal" id="modalKosereva">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Kosereva</h2>
        <p id="descripcionReceta">Postre tradicional de Paraguay, hecho con cáscara de naranja agria.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Cáscara de naranja agria</li>
            <li>Azúcar</li>
            <li>Agua</li>
            <li>Maíz (opcional)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir las cáscaras en agua hasta que estén suaves.</li>
            <li>Endulzar al gusto y servir.</li>
        </ol>
    </div>
</div>

<!-- Modal Mazamorra -->
<div class="modal" id="modalMazamorra">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Mazamorra</h2>
        <p id="descripcionReceta">Postre tradicional hecho de maíz blanco cocido en agua y miel negra.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Maíz blanco</li>
            <li>Agua</li>
            <li>Miel negra</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer el maíz en agua hasta que esté tierno.</li>
            <li>Agregar miel negra al gusto y mezclar bien.</li>
        </ol>
    </div>
</div>

<!-- Modal Payaguá Mascada -->
<div class="modal" id="modalPayaguaMascada">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Payaguá Mascada</h2>
        <p id="descripcionReceta">Croquetas de carne y mandioca hervida, fritas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Carne molida</li>
            <li>Mandioca</li>
            <li>Sal al gusto</li>
            <li>Pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la mandioca y hacerla puré.</li>
            <li>Mezclar con la carne y formar las croquetas.</li>
            <li>Freír hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Pan de Queso -->
<div class="modal" id="modalPanDeQueso">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pan de Queso</h2>
        <p id="descripcionReceta">Pequeños panes de queso, suaves por dentro y crujientes por fuera.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Queso</li>
            <li>Harina</li>
            <li>Leche</li>
            <li>Sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar todos los ingredientes hasta formar una masa.</li>
            <li>Formar bolitas y hornear hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Budín de Mandioca -->
<div class="modal" id="modalBudinDeMandioca">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Budín de Mandioca</h2>
        <p id="descripcionReceta">Delicioso budín hecho a base de mandioca, ideal para acompañar el té.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Mandioca</li>
            <li>Huevos</li>
            <li>Azúcar</li>
            <li>Leche</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer la mandioca y hacerla puré.</li>
            <li>Mezclar con los demás ingredientes y hornear.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanaditas de Viento -->
<div class="modal" id="modalEmpanaditasDeViento">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Empanaditas de Viento</h2>
        <p id="descripcionReceta">Empanadas fritas ligeras, rellenas de queso o dulce.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>Harina</li>
            <li>Queso o dulce</li>
            <li>Agua</li>
            <li>Sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hacer la masa con harina, agua y sal.</li>
            <li>Rellenar con queso o dulce y freír.</li>
        </ol>
    </div>
</div>

<!-- Modal Pollo al Horno con Mandioca -->
<div class="modal" id="modalPolloAlHornoConMandioca">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pollo al Horno con Mandioca</h2>
        <p id="descripcionReceta">Pollo al horno acompañado de mandioca hervida o frita.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 Pollo</li>
            <li>Mandioca</li>
            <li>Especias al gusto</li>
            <li>Sal</li>
            <li>Pimienta</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Precalentar el horno a 180°C.</li>
            <li>Aderezar el pollo y colocar en una bandeja.</li>
            <li>Cocer mandioca en agua hirviendo.</li>
            <li>Hornear el pollo durante 45 minutos.</li>
        </ol>
    </div>
</div>

<!-- Modal Milanesa de Carne con Puré -->
<div class="modal" id="modalMilanesaDeCarneConPure">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Milanesa de Carne con Puré</h2>
        <p id="descripcionReceta">Clásica milanesa acompañada de puré de papas cremoso.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de Carne</li>
            <li>Pan rallado</li>
            <li>1 Huevo</li>
            <li>Papas</li>
            <li>Sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Empanizar la carne con huevo y pan rallado.</li>
            <li>Freír hasta dorar.</li>
            <li>Hervir las papas y hacer puré.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanadas Paraguayas -->
<div class="modal" id="modalEmpanadasParaguayas">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Empanadas Paraguayas</h2>
        <p id="descripcionReceta">Empanadas fritas de carne o pollo, típicas de la cena paraguaya.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de Carne o Pollo</li>
            <li>Harina</li>
            <li>1 Huevo</li>
            <li>Cebolla</li>
            <li>Sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar la masa con harina y agua.</li>
            <li>Rellenar con la mezcla de carne o pollo.</li>
            <li>Freír hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Guiso de Fideo -->
<div class="modal" id="modalGuisoDeFideo">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Guiso de Fideo</h2>
        <p id="descripcionReceta">Guiso de fideos con carne y verduras, ideal para un almuerzo completo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>200g de Fideos</li>
            <li>300g de Carne</li>
            <li>Verduras al gusto</li>
            <li>Caldo de carne</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Hervir la carne en agua con sal.</li>
            <li>Añadir las verduras y el caldo.</li>
            <li>Agregar los fideos y cocinar hasta que estén tiernos.</li>
        </ol>
    </div>
</div>

<!-- Modal Sopa So'o -->
<div class="modal" id="modalSopaSoo">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Sopa So'o</h2>
        <p id="descripcionReceta">Versión de sopa paraguaya con carne picada dorada en horno.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de Carne</li>
            <li>500g de Harina de maíz</li>
            <li>Leche</li>
            <li>Sal</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar los ingredientes en un bol.</li>
            <li>Colocar en una bandeja para hornear.</li>
            <li>Cocinar en horno precalentado hasta dorar.</li>
        </ol>
    </div>
</div>

<!-- Modal Empanadas de Carne -->
<div class="modal" id="modalEmpanadasDeCarne">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Empanadas de Carne</h2>
        <p id="descripcionReceta">Empanadas rellenas de carne sazonada, fritas o al horno, acompañadas con salsa picante.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de Carne</li>
            <li>Harina</li>
            <li>1 Huevo</li>
            <li>Especias al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Preparar la masa y dejar reposar.</li>
            <li>Rellenar con carne sazonada.</li>
            <li>Freír o hornear hasta dorar.</li>
        </ol>
    </div>
</div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
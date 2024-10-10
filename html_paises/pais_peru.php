<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perú</title>

        <link rel="stylesheet" href="../html_paises/css/paises.css">
        <script src="../html_paises/js/ordenarRecetas.js" defer></script>
        <script src="js/ordenarRecetas.js" defer></script>
        
        <?php include '../includes/head.php'?>
    </head>
    
<body>
<?php include '../includes/header.php'?>
    
    <h2 class="text-center pt-5">Las mejores recetas de Peru</h2>
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
    
    <!-- Recetas Peruanas -->
    <div class="container mt-5">
        <div class="row">
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Pan con Chicharrón.jpg" class="card-img-top" alt="pan con chicharron">
                    <div class="card-body">
                        <h5 class="card-title">Pan con Chicharrón</h5>
                        <p class="card-text">Sándwich de cerdo frito, servido con camote y salsa criolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanConChicharron">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Tacu Tacu.jpg" class="card-img-top" alt="tacu tacu">
                    <div class="card-body">
                        <h5 class="card-title">Tacu Tacu</h5>
                        <p class="card-text">Arroz y frijoles mezclados, servidos con huevo frito.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTacuTacu">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Chicharrón de Pollo.jpg" class="card-img-top" alt="chicharron de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Chicharrón de Pollo</h5>
                        <p class="card-text">Pollo frito crocante, ideal para acompañar con pan.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalChicharronDePollo">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Mazamorra Morada.jpg" class="card-img-top" alt="mazamorra morada">
                    <div class="card-body">
                        <h5 class="card-title">Mazamorra Morada</h5>
                        <p class="card-text">Postre de maíz morado, a base de maíz morado, frutas y especias.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalMazamorraMorada">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Tamal.jpg" class="card-img-top" alt="tamal">
                    <div class="card-body">
                        <h5 class="card-title">Tamal</h5>
                        <p class="card-text">Tamales de maíz dulce, cocidos en hojas de maíz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTamal">Ver Receta</a>
                    </div>
                </div>
            </div>
            <!-- Desayuno -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion desayuno">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Pan con Atún y Cebolla.png" class="card-img-top" alt="pan con atun y cebolla">
                    <div class="card-body">
                        <h5 class="card-title">Pan con Atún y Cebolla</h5>
                        <p class="card-text">Un pan fresco relleno de una mezcla sabrosa de atún y cebolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPanConAtunYcebolla">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion  almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Ceviche.jpg" class="card-img-top" alt="ceviche">
                    <div class="card-body">
                        <h5 class="card-title">Ceviche</h5>
                        <p class="card-text">Pescado marinado en limón, servido con cebolla y maíz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCeviche">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Lomo Saltado.jpg" class="card-img-top" alt="lomo saltado">
                    <div class="card-body">
                        <h5 class="card-title">Lomo Saltado</h5>
                        <p class="card-text">Salteado de carne, cebolla y tomate, servido con arroz y papas fritas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalLomoSaltado">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Ají de Gallina.jpg" class="card-img-top" alt="aji de gallina">
                    <div class="card-body">
                        <h5 class="card-title">Ají de Gallina</h5>
                        <p class="card-text">Pollo desmenuzado en salsa de ají amarillo, servido con arroz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAjiDeGallina">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Seco de Cordero.jpg" class="card-img-top" alt="seco de cordero">
                    <div class="card-body">
                        <h5 class="card-title">Seco de Cordero</h5>
                        <p class="card-text">Guiso de cordero con cilantro y especias, servido con arroz.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalSecoDeCordero">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Arroz con Pollo.jpg" class="card-img-top" alt="arroz con pollo">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Pollo</h5>
                        <p class="card-text">Arroz cocido con pollo y verduras, un plato familiar.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozConPollo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Almuerzo -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion almuerzo">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Pachamanca.jpg" class="card-img-top" alt="pachamanca">
                    <div class="card-body">
                        <h5 class="card-title">Pachamanca</h5>
                        <p class="card-text">Carne y vegetales cocidos en tierra, un plato andino tradicional.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPachamanca">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Papa con Huevo.jpg" class="card-img-top" alt="papa con huevo">
                    <div class="card-body">
                        <h5 class="card-title">Papa con Huevo</h5>
                        <p class="card-text">Papa sancochada acompañada de huevo duro y salsa criolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPapaConHuevo">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Yuquitas Fritas.jpg" class="card-img-top" alt="yuquitas fritas">
                    <div class="card-body">
                        <h5 class="card-title">Yuquitas Fritas</h5>
                        <p class="card-text">Bastones de yuca fritos, acompañados de salsa huancaína.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalYuquitasFritas">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Tamalito Verde.jpg" class="card-img-top" alt="tamalito verde">
                    <div class="card-body">
                        <h5 class="card-title">Tamalito Verde</h5>
                        <p class="card-text">Pequeños tamales de maíz con culantro, rellenos de cerdo o pollo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTamalitoVerde">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Picarones.jpg" class="card-img-top" alt="picarones">
                    <div class="card-body">
                        <h5 class="card-title">Picarones</h5>
                        <p class="card-text">Dulces fritos en aceite vegetas hechos con masa de camote y zapallo, bañados en miel de chancaca.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPicarones">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Arroz Zambito.jpg" class="card-img-top" alt="arroz zambito">
                    <div class="card-body">
                        <h5 class="card-title">Arroz Zambito</h5>
                        <p class="card-text">Postre a base de arroz, leche, chancaca y frutas secas, similar al arroz con leche pero más dulce.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozZambito">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Merienda -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion merienda">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Arroz con Leche y Mazamorra.jpg" class="card-img-top" alt="arroz con leche y mazamorra">
                    <div class="card-body">
                        <h5 class="card-title">Arroz con Leche y Mazamorra</h5>
                        <p class="card-text">Una combinación de Arroz con Leche cremoso y Mazamorra Morada con maíz morado, frutas y especias.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalArrozConLecheYmazamorra">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Pollo a la Brasa.jpg" class="card-img-top" alt="pollo a la brasa">
                    <div class="card-body">
                        <h5 class="card-title">Pollo a la Brasa</h5>
                        <p class="card-text">Pollo asado marinado en especias, servido con papas fritas y ensalada.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPolloABrasa">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Anticuchos.jpg" class="card-img-top" alt="anticuchos">
                    <div class="card-body">
                        <h5 class="card-title">Anticuchos</h5>
                        <p class="card-text">Brochetas de corazón de res marinadas en ají panca, servidas con papas.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalAnticuchos">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Tallarines Verdes.jpg" class="card-img-top" alt="tallarines verdes">
                    <div class="card-body">
                        <h5 class="card-title">Tallarines Verdes</h5>
                        <p class="card-text">Pasta en salsa de albahaca y espinacas, servida con bistec frito.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalTallarinesVerdes">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Causa Limeña.jpg" class="card-img-top" alt="causa limeña">
                    <div class="card-body">
                        <h5 class="card-title">Causa Limeña</h5>
                        <p class="card-text">Puré de papa relleno de atún o pollo, con palta y huevo.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCausaLimena">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Papa Rellena.jpg" class="card-img-top" alt="papa rellena">
                    <div class="card-body">
                        <h5 class="card-title">Papa Rellena</h5>
                        <p class="card-text">Papa frita rellena de carne, cebolla y especias, acompañada de salsa criolla.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalPapaRellena">Ver Receta</a>
                    </div>
                </div>
            </div>

            <!-- Cena -->
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 seccion cena">
                <div class="card h-100">
                    <img src="../html_paises/img/imgPeru/Ceviche de Pollo.jpg" class="card-img-top" alt="ceviche de pollo">
                    <div class="card-body">
                        <h5 class="card-title">Ceviche de Pollo</h5>
                        <p class="card-text">Trozos de pollo marinados en jugo de limón, cebolla y ají, servidos con maíz y camote.</p>
                        <a href="#" class="btn btn-primary verReceta" data-modal="modalCevichePollo">Ver Receta</a>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>

<!-- Modal Pan con Chicharrón -->
<div id="modalPanConChicharron" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pan con Chicharrón</h2>
        <p id="descripcionReceta">Sándwich de cerdo frito, servido con camote y salsa criolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pan francés</li>
            <li>200 g de chicharrón</li>
            <li>Camote (batata) cocido</li>
            <li>Salsa criolla (cebolla, ají, limón)</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Freír el chicharrón hasta dorar.</li>
            <li>Calentar el pan y añadir el chicharrón.</li>
            <li>Agregar el camote y la salsa criolla.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Tacu Tacu -->
<div id="modalTacuTacu" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tacu Tacu</h2>
        <p id="descripcionReceta">Arroz y frijoles mezclados, servidos con huevo frito.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de arroz</li>
            <li>1 taza de frijoles cocidos</li>
            <li>1 huevo frito</li>
            <li>Sal y pimienta al gusto</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el arroz con los frijoles.</li>
            <li>Formar una masa y freír hasta dorar.</li>
            <li>Servir con un huevo frito encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Chicharrón de Pollo -->
<div id="modalChicharronDePollo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Chicharrón de Pollo</h2>
        <p id="descripcionReceta">Pollo frito crocante, ideal para acompañar con pan.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de pollo en trozos</li>
            <li>Sal y pimienta al gusto</li>
            <li>Especias al gusto (ajo, comino)</li>
            <li>Aceite para freír</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el pollo con las especias.</li>
            <li>Freír en aceite caliente hasta dorar.</li>
            <li>Servir caliente con pan.</li>
        </ol>
    </div>
</div>

<!-- Modal Mazamorra Morada -->
<div id="modalMazamorraMorada" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Mazamorra Morada</h2>
        <p id="descripcionReceta">Postre de maíz morado, a base de maíz morado, frutas y especias.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de maíz morado</li>
            <li>1 taza de azúcar</li>
            <li>1/2 taza de frutas (piña, manzana)</li>
            <li>Especias (canela, clavo)</li>
            <li>Agua</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer el maíz morado en agua hasta que esté suave.</li>
            <li>Colar y hacer un puré.</li>
            <li>Agregar azúcar y frutas, y cocinar a fuego lento.</li>
            <li>Servir frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Tamal -->
<div id="modalTamal" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tamal</h2>
        <p id="descripcionReceta">Tamales de maíz dulce, cocidos en hojas de maíz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de masa de maíz</li>
            <li>1 taza de azúcar</li>
            <li>Hojas de maíz</li>
            <li>Sal al gusto</li>
            <li>Agua</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar la masa con azúcar y sal.</li>
            <li>Extender la masa sobre las hojas de maíz.</li>
            <li>Enrollar y cocer al vapor durante 1 hora.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pan con Atún y Cebolla -->
<div id="modalPanConAtunYcebolla" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pan con Atún y Cebolla</h2>
        <p id="descripcionReceta">Un pan fresco relleno de una mezcla sabrosa de atún y cebolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pan fresco</li>
            <li>1 lata de atún</li>
            <li>1 cebolla picada</li>
            <li>Mayonesa al gusto</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el atún con cebolla y mayonesa.</li>
            <li>Agregar sal y pimienta al gusto.</li>
            <li>Rellenar el pan con la mezcla.</li>
            <li>Servir frío o a temperatura ambiente.</li>
        </ol>
    </div>
</div>

<!-- Modal Ceviche -->
<div id="modalCeviche" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ceviche</h2>
        <p id="descripcionReceta">Pescado marinado en limón, servido con cebolla y maíz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de pescado fresco</li>
            <li>1 cebolla roja</li>
            <li>Jugo de 4 limones</li>
            <li>1 taza de maíz chulpe</li>
            <li>Sal y ají al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el pescado en cubos y marinar en limón.</li>
            <li>Añadir cebolla y maíz, y mezclar.</li>
            <li>Dejar reposar unos minutos y servir frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Ceviche -->
<div id="modalCeviche" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ceviche</h2>
        <p id="descripcionReceta">Pescado marinado en limón, servido con cebolla y maíz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de pescado fresco (merluza o corvina)</li>
            <li>1 taza de jugo de limón</li>
            <li>1 cebolla roja, en rodajas</li>
            <li>1 taza de maíz chulpe</li>
            <li>Sal y pimienta al gusto</li>
            <li>Cilantro fresco para decorar</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el pescado en cubos y marinarlo con el jugo de limón por 20 minutos.</li>
            <li>Añadir la cebolla, sal y pimienta al gusto.</li>
            <li>Servir con maíz chulpe y decorar con cilantro.</li>
        </ol>
    </div>
</div>

<!-- Modal Lomo Saltado -->
<div id="modalLomoSaltado" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Lomo Saltado</h2>
        <p id="descripcionReceta">Salteado de carne, cebolla y tomate, servido con arroz y papas fritas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de lomo de res</li>
            <li>1 cebolla roja, en tiras</li>
            <li>2 tomates, en gajos</li>
            <li>2 cucharadas de salsa de soja</li>
            <li>Papas fritas al gusto</li>
            <li>Arroz blanco cocido</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar la carne en tiras y saltearla en una sartén caliente.</li>
            <li>Añadir la cebolla y el tomate, y saltear por unos minutos.</li>
            <li>Incorporar la salsa de soja y mezclar bien.</li>
            <li>Servir con arroz y papas fritas.</li>
        </ol>
    </div>
</div>

<!-- Modal Ají de Gallina -->
<div id="modalAjiDeGallina" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ají de Gallina</h2>
        <p id="descripcionReceta">Pollo desmenuzado en salsa de ají amarillo, servido con arroz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pollo hervido y desmenuzado</li>
            <li>2 ajíes amarillos, sin semillas</li>
            <li>1 cebolla, picada</li>
            <li>1 taza de leche evaporada</li>
            <li>Pan remojado en caldo</li>
            <li>Arroz blanco cocido</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Licuar los ajíes amarillos con la cebolla y el pan remojado.</li>
            <li>Calentar en una sartén y añadir el pollo desmenuzado.</li>
            <li>Agregar la leche evaporada y mezclar bien.</li>
            <li>Servir con arroz blanco.</li>
        </ol>
    </div>
</div>

<!-- Modal Seco de Cordero -->
<div id="modalSecoDeCordero" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Seco de Cordero</h2>
        <p id="descripcionReceta">Guiso de cordero con cilantro y especias, servido con arroz.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500 g de cordero, en trozos</li>
            <li>1 cebolla, picada</li>
            <li>2 dientes de ajo, picados</li>
            <li>1 taza de cilantro, licuado con agua</li>
            <li>Sal y pimienta al gusto</li>
            <li>Arroz blanco cocido</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>En una olla, dorar el cordero con cebolla y ajo.</li>
            <li>Agregar el cilantro licuado y cocinar a fuego lento.</li>
            <li>Servir caliente con arroz.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz con Pollo -->
<div id="modalArrozConPollo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz con Pollo</h2>
        <p id="descripcionReceta">Arroz cocido con pollo y verduras, un plato familiar.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 pollo en trozos</li>
            <li>2 tazas de arroz</li>
            <li>1 zanahoria, en cubos</li>
            <li>1 pimiento, en tiras</li>
            <li>3 tazas de caldo de pollo</li>
            <li>Sal y pimienta al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Dorar el pollo en una olla y reservar.</li>
            <li>En la misma olla, añadir las verduras y el arroz.</li>
            <li>Incorporar el caldo y el pollo, y cocinar a fuego lento.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Pachamanca -->
<div id="modalPachamanca" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pachamanca</h2>
        <p id="descripcionReceta">Carne y vegetales cocidos en tierra, un plato andino tradicional.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de carne (pollo, cordero o cerdo)</li>
            <li>4 papas</li>
            <li>2 choclos</li>
            <li>Hierbas andinas (huacatay, perejil)</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar la carne con hierbas y sal.</li>
            <li>Hacer un hoyo en la tierra y calentar piedras.</li>
            <li>Colocar la carne y los vegetales en el hoyo, cubrir y cocinar.</li>
            <li>Servir caliente.</li>
        </ol>
    </div>
</div>

<!-- Modal Papa con Huevo -->
<div id="modalPapaConHuevo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Papa con Huevo</h2>
        <p id="descripcionReceta">Papa sancochada acompañada de huevo duro y salsa criolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 papas medianas</li>
            <li>2 huevos duros</li>
            <li>Salsa criolla (cebolla, limón, ají)</li>
            <li>Sal al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Sancochar las papas en agua con sal hasta que estén tiernas.</li>
            <li>Hervir los huevos hasta que estén duros.</li>
            <li>Servir las papas con los huevos cortados y la salsa criolla por encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Yuquitas Fritas -->
<div id="modalYuquitasFritas" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Yuquitas Fritas</h2>
        <p id="descripcionReceta">Bastones de yuca fritos, acompañados de salsa huancaína.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 kg de yuca</li>
            <li>Aceite para freír</li>
            <li>Sal al gusto</li>
            <li>Salsa huancaína (aji, queso, leche)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Pelar y cortar la yuca en bastones.</li>
            <li>Freír los bastones de yuca en aceite caliente hasta dorar.</li>
            <li>Servir con salsa huancaína al lado.</li>
        </ol>
    </div>
</div>

<!-- Modal Tamalito Verde -->
<div id="modalTamalitoVerde" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tamalito Verde</h2>
        <p id="descripcionReceta">Pequeños tamales de maíz con culantro, rellenos de cerdo o pollo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>2 tazas de maíz molido</li>
            <li>1 taza de culantro</li>
            <li>300g de cerdo o pollo</li>
            <li>Sal y pimienta al gusto</li>
            <li>Hoja de plátano para envolver</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Mezclar el maíz con el culantro y sazonar.</li>
            <li>Rellenar las hojas de plátano con la mezcla y el relleno de cerdo o pollo.</li>
            <li>Cocinar al vapor por aproximadamente 1 hora.</li>
        </ol>
    </div>
</div>

<!-- Modal Picarones -->
<div id="modalPicarones" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Picarones</h2>
        <p id="descripcionReceta">Dulces fritos en aceite vegetas hechos con masa de camote y zapallo, bañados en miel de chancaca.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de camote</li>
            <li>500g de zapallo</li>
            <li>500g de harina</li>
            <li>Miel de chancaca</li>
            <li>1 cucharadita de anís</li>
            <li>1 cucharadita de sal</li>
            <li>Agua al gusto</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer y hacer puré el camote y zapallo.</li>
            <li>Mezclar con la harina, sal y anís, formar una masa suave.</li>
            <li>Formar los picarones y freír en aceite caliente hasta dorar.</li>
            <li>Servir con miel de chancaca.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz Zambito -->
<div id="modalArrozZambito" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz Zambito</h2>
        <p id="descripcionReceta">Postre a base de arroz, leche, chancaca y frutas secas, similar al arroz con leche pero más dulce.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de arroz</li>
            <li>2 tazas de leche</li>
            <li>1 taza de chancaca</li>
            <li>Frutas secas (pasa, almendra)</li>
            <li>1 pizca de canela</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el arroz con leche hasta que esté tierno.</li>
            <li>Agregar la chancaca y mezclar hasta que se disuelva.</li>
            <li>Incorporar las frutas secas y la canela.</li>
            <li>Servir tibio o frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Arroz con Leche y Mazamorra -->
<div id="modalArrozConLecheYmazamorra" class="modal">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Arroz con Leche y Mazamorra</h2>
        <p id="descripcionReceta">Una combinación de Arroz con Leche cremoso y Mazamorra Morada con maíz morado, frutas y especias.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 taza de arroz</li>
            <li>4 tazas de leche</li>
            <li>1/2 taza de mazamorra morada</li>
            <li>1/2 taza de azúcar</li>
            <li>Especias (canela, clavo de olor)</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar el arroz con leche y especias hasta que esté cremoso.</li>
            <li>Servir en un plato y añadir la mazamorra morada encima.</li>
        </ol>
    </div>
</div>

<!-- Modal Pollo a la Brasa -->
<div class="modal" id="modalPolloABrasa">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Pollo a la Brasa</h2>
        <p id="descripcionReceta">Pollo asado marinado en especias, servido con papas fritas y ensalada.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>1 Pollo entero</li>
            <li>Especias al gusto</li>
            <li>Papas fritas</li>
            <li>Ensalada</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el pollo con las especias por 24 horas.</li>
            <li>Asar el pollo en un horno precalentado.</li>
            <li>Servir con papas fritas y ensalada.</li>
        </ol>
    </div>
</div>

<!-- Modal Anticuchos -->
<div class="modal" id="modalAnticuchos">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Anticuchos</h2>
        <p id="descripcionReceta">Brochetas de corazón de res marinadas en ají panca, servidas con papas.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de corazón de res</li>
            <li>Ají panca al gusto</li>
            <li>Papas</li>
            <li>Sal y pimienta</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Marinar el corazón de res en ají panca por 2 horas.</li>
            <li>Ensartar en brochetas y asar a la parrilla.</li>
            <li>Servir con papas cocidas.</li>
        </ol>
    </div>
</div>

<!-- Modal Tallarines Verdes -->
<div class="modal" id="modalTallarinesVerdes">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Tallarines Verdes</h2>
        <p id="descripcionReceta">Pasta en salsa de albahaca y espinacas, servida con bistec frito.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300g de tallarines</li>
            <li>Un manojo de albahaca</li>
            <li>300g de espinacas</li>
            <li>1 bistec</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocinar los tallarines según las instrucciones del paquete.</li>
            <li>Licuar albahaca y espinacas con un poco de agua.</li>
            <li>Mezclar la salsa con los tallarines y servir con bistec frito.</li>
        </ol>
    </div>
</div>

<!-- Modal Causa Limeña -->
<div class="modal" id="modalCausaLimena">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Causa Limeña</h2>
        <p id="descripcionReceta">Puré de papa relleno de atún o pollo, con palta y huevo.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>500g de papa amarilla</li>
            <li>Atún o pollo al gusto</li>
            <li>Palta</li>
            <li>Huevo duro</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer las papas y hacer un puré.</li>
            <li>Rellenar con atún o pollo y colocar palta encima.</li>
            <li>Decorar con huevo duro y servir frío.</li>
        </ol>
    </div>
</div>

<!-- Modal Papa Rellena -->
<div class="modal" id="modalPapaRellena">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Papa Rellena</h2>
        <p id="descripcionReceta">Papa frita rellena de carne, cebolla y especias, acompañada de salsa criolla.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>4 papas grandes</li>
            <li>300g de carne molida</li>
            <li>Cebolla al gusto</li>
            <li>Salsa criolla</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cocer las papas y hacer un puré.</li>
            <li>Rellenar con carne y cebolla, formar bolitas y freír.</li>
            <li>Servir con salsa criolla.</li>
        </ol>
    </div>
</div>

<!-- Modal Ceviche de Pollo -->
<div class="modal" id="modalCevichePollo">
    <div class="modal-contenido">
        <span class="cerrar">&times;</span>
        <h2 id="nombreReceta">Ceviche de Pollo</h2>
        <p id="descripcionReceta">Trozos de pollo marinados en jugo de limón, cebolla y ají, servidos con maíz y camote.</p>
        <h3>Ingredientes:</h3>
        <ul id="ingredientesReceta">
            <li>300g de pollo</li>
            <li>Jugo de limón al gusto</li>
            <li>Cebolla al gusto</li>
            <li>Maíz y camote</li>
        </ul>
        <h3>Pasos:</h3>
        <ol id="pasosReceta">
            <li>Cortar el pollo en trozos y marinar en jugo de limón.</li>
            <li>Añadir cebolla y ají al gusto.</li>
            <li>Servir con maíz y camote.</li>
        </ol>
    </div>
</div>


    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; 2024 Recetas de America. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
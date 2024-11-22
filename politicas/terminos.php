<?php
session_start();
include '../includes/permisos.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - Laboratorio de Programación</title>
    <!-- Bootstrap CSS -->
    <?php include '../includes/head.php' ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../politicas/colores.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include '../includes/header.php';
    include '../includes/conec_db.php';
    ?>

    <main class="flex-grow-1">
        <div class="container my-5">
            <!-- Título -->
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1 class="display-4 text-primary">Términos y Condiciones</h1>
                    <p class="lead text-muted">Laboratorio de Programación - Facultad Provincial de Ezeiza</p>
                </div>
            </div>

            <!-- Contenido de la página -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Introducción -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Introducción</h3>
                            <p class="card-text">
                                Este documento establece los términos y condiciones de uso del sitio web del proyecto "Laboratorio de Programación", desarrollado por los estudiantes de la Facultad Provincial de Ezeiza: Sasha Medina, Patricio Lara, Pepe Acuña, Matías Paez y Matías Mamani. Al acceder y utilizar este sitio, aceptas cumplir con estos términos. Si no estás de acuerdo, no utilices este sitio web.
                            </p>
                        </div>
                    </div>

                    <!-- Objetivo del Proyecto -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Objetivo del Proyecto</h3>
                            <p class="card-text">
                                El propósito de este sitio web es proporcionar una plataforma educativa para la práctica de programación, incluyendo lenguajes como PHP, HTML, JavaScript, Bootstrap y bases de datos SQL. Todo el contenido y funcionalidad del sitio tiene fines estrictamente académicos y educativos, supervisados por los docentes de la materia.
                            </p>
                        </div>
                    </div>

                    <!-- Uso Permitido -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Uso Permitido</h3>
                            <p class="card-text">
                                Los usuarios pueden navegar por el sitio, interactuar con los formularios, sistemas y contenido únicamente para fines educativos. Está prohibido el uso del sitio para fines comerciales, ilícitos o para causar daño a otros usuarios o al sistema.
                            </p>
                        </div>
                    </div>

                    <!-- Responsabilidad del Usuario -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Responsabilidad del Usuario</h3>
                            <p class="card-text">
                                Al utilizar este sitio, el usuario se compromete a:
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item">Proporcionar información veraz y precisa al interactuar con formularios o sistemas del sitio.</li>
                                <li class="list-group-item">Respetar las normas de convivencia y evitar cualquier conducta que pueda afectar negativamente a otros usuarios o al sistema.</li>
                                <li class="list-group-item">Reportar cualquier error o mal funcionamiento a los desarrolladores del proyecto.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Limitaciones de Responsabilidad -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Limitaciones de Responsabilidad</h3>
                            <p class="card-text">
                                Este sitio web es un proyecto educativo. Ni los estudiantes desarrolladores ni la Facultad Provincial de Ezeiza serán responsables por:
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item">Pérdidas o daños causados por errores en el sistema.</li>
                                <li class="list-group-item">Problemas derivados del mal uso de la plataforma por parte de los usuarios.</li>
                                <li class="list-group-item">Interrupciones temporales en el servicio debido a mantenimiento o fallas técnicas.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Modificaciones a los Términos -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Modificaciones a los Términos</h3>
                            <p class="card-text">
                                Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Las actualizaciones serán publicadas en esta página, y el uso continuo del sitio implicará la aceptación de los nuevos términos.
                            </p>
                        </div>
                    </div>

                    <!-- Contacto -->
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Contacto</h3>
                            <p class="card-text">
                                Si tienes preguntas o inquietudes sobre estos términos y condiciones, puedes comunicarte con los desarrolladores a través del correo electrónico: 
                                <a href="mailto:recipes.web.upe@gmail.com">recipes.web.upe@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

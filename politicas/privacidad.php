<?php
session_start();
include '../includes/permisos.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad - Laboratorio de Programación</title>
    <!-- Bootstrap CSS -->
    <?php include '../includes/head.php'; ?>
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
                    <h1 class="display-4 text-primary">Política de Privacidad</h1>
                    <p class="lead text-muted ">Laboratorio de Programación - Facultad Provincial de Ezeiza</p>
                </div>
            </div>

            <!-- Contenido de la página -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Información que Recopilamos</h3>
                            <p class="card-text">
                                Durante tu interacción con nuestro sistema, recopilamos información básica como tu nombre, correo electrónico y otros datos que decides proporcionar. Toda esta información es ficticia y es utilizada con fines exclusivamente educativos.
                            </p>
                        </div>
                    </div>

                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Uso de los Datos</h3>
                            <p class="card-text">
                                Los datos recopilados se utilizan únicamente para fines académicos y para evaluar el funcionamiento del proyecto. No serán compartidos con terceros fuera del contexto educativo de la Facultad Provincial de Ezeiza.
                            </p>
                        </div>
                    </div>

                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Protección de los Datos</h3>
                            <p class="card-text">
                                Nos tomamos la seguridad de tus datos muy en serio. Empleamos medidas técnicas y organizativas para garantizar que tu información personal esté protegida contra accesos no autorizados o pérdidas accidentales.
                            </p>
                        </div>
                    </div>

                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Retención de los Datos</h3>
                            <p class="card-text">
                                Los datos se almacenarán durante el tiempo necesario para los propósitos educativos de este proyecto. Una vez que el proyecto termine, los datos serán eliminados.
                            </p>
                        </div>
                    </div>

                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Tus Derechos</h3>
                            <p class="card-text">
                                Como usuario, tienes derecho a solicitar el acceso, corrección o eliminación de los datos que hemos recopilado. Para ejercer estos derechos, puedes ponerte en contacto con nosotros a través del correo electrónico: <a href="mailto:recipes.web.upe@gmail.com">recipes.web.upe@gmail.com</a>.
                            </p>
                        </div>
                    </div>

                    <div class="card shadow-lg border-light mb-4">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Actualizaciones a esta Política</h3>
                            <p class="card-text">
                                Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Los cambios serán publicados en esta página y te recomendamos revisarla periódicamente para mantenerte informado.
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

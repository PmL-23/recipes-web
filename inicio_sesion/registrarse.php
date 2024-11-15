<?php
require_once '../includes/conec_db.php';
include '../includes/paises.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recetario</title>
<!--         
        <link rel="stylesheet" href="../css_inicio_sesion/estilo_sesion.css">
        <link rel="stylesheet" href="../css_inicio_sesion/iniciarSesion.css">
        <script src="js/inicioSesion.js" defer></script>
-->
        <script src="registrarse.js" defer></script>
        <?php include '../includes/head.php'?>
    </head> 

<?php include '../includes/header.php'?>

<!-- Registrarse -->
<section id="formulario" class="d-flex justify-content-center pt-5">
    <div class="container col-lg-6 col-md-8 min-vh-100 mx-md-5">
        <h1 class="mb-2 text-center">Crear nueva cuenta</h1>
        
        <div class="alert alert-danger d-none" id="cartel-error">
            <ul class="" id="lista-error">
                
            </ul>
        </div>
            <form name="Nuevo Usuario" method="POST" action="procesar_registro.php" id="frm-usuario">
                <div class="mb-4 mt-5">
                    <label for="username" class="form-label h6">Nombre de usuario <span class="text-danger">*</span></label>
                    <input id="username" type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su nombre de usuario">
                    <div class="form-text text-danger" id="error-username"></div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label h6">Contraseña <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="new-password" placeholder="Ingrese su contraseña">
                    <div class="form-text text-danger" id="error-password"></div>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label h6">Confirmar contraseña <span class="text-danger">*</span></label>
                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" maxlength="20" autocomplete="new-password" placeholder="Ingrese su contraseña nuevamente">
                    <div class="form-text text-danger" id="error-confirm-password"></div>
                </div>

                <div class="mb-4">
                    <label for="nomCompleto" class="form-label h6">Nombre y Apellido <span class="text-danger">*</span></label>
                    <input id="nomCompleto" type="text" class="form-control" name="nomCompleto" placeholder="Ingrese su nombre completo: 'Nombre Apellido'">
                    <div class="form-text text-danger" id="error-nombre"></div>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label h6">Email <span class="text-danger">*</span></label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Ingrese su email">
                    <div class="form-text text-danger" id="error-email"></div>
                </div>

                <div class="mb-4">
                    <label for="fecha_nacimiento" class="form-label h6">Fecha de nacimiento <span class="text-danger">*</span></label>
                    <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" min="18" placeholder="Ingrese su fecha de nacimiento">
                    <div class="form-text text-danger" id="error-fecha-nacimiento"></div>
                </div>

                <div class="mb-4">
                    <label for="id_pais" class="form-label h6">País <span class="text-danger">*</span></label>
                    <select name="id_pais" id="id_pais" class="form-control">
                        <option value="" disabled selected>Seleccione un pais</option>
                        <!-- <option value="otro">Otro país</option> -->   
                        <?php
                            foreach ($paises as $pais) {
                            echo '<option value="'.$pais['id_pais'].'">'.$pais['nombre'].'</option>';
                            }
                            ?>
                     </select>
                     <div class="form-text text-danger" id="error-pais"></div>
                </div>

                <div class="d-flex justify-content-between">
                    <input id="borrar" type="reset" class="boton-secundario" value="Borrar Campos">
                    <button type="submit" class="boton-principal">Registrarse</button>
                </div>
            </form>
            <div class="d-flex justify-content-center mt-5 mb-5">
                <small>¿Ya estás registrado?<a href="iniciarSesion.php" class="ms-2 mb-5 text-decoration-none">Iniciar Sesión</a></small>
            </div>
        </div>

    </section>

    <div class="pt-2"></div>

<?php include '../includes/footer.php'?>

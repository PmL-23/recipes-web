<?php
require_once '../includes/conec_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = isset($_POST["username"]) ? $_POST["username"] : NULL;
    $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
    $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : NULL;
    $nomCompleto = isset($_POST["nomCompleto"]) ? $_POST["nomCompleto"] : NULL;
    $email = isset($_POST["email"]) ? $_POST["email"] : NULL;
    $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : NULL;

    
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirm_password"]) || empty($_POST["nomCompleto"])|| empty($_POST["email"])|| empty($_POST["fecha_nacimiento"])) {
        echo "Por favor, completa todos los campos para registrar el nuevo usuario de forma exitosa.";
        exit();
    }//verifico que todos los campos estén completos.

    if ($password != $confirm_password) {
        echo "Las contraseñas ingresadas no coinciden";
        exit();
    }

    $hashedPassword = password_hash(password: $password, algo: PASSWORD_DEFAULT);

    // valido que el campo no este vacio
    if (trim($nomCompleto) === '') {
        echo "El campo nombre no puede estar vacío.";
        exit();
    }

    // divido la cadena del input por cada espacio que encuentre, y lo guardo en la variable palabras
    $palabras = explode(' ', $nomCompleto);

    // Valido que palabras sea distinto de 2, es decir, que no exista mas ni menos de 2 palabras
    if (count($palabras) != 2) {
        echo "El campo nombre debe contener al menos dos palabras.";
        exit();
    }

    // Verifico si el usuario ya está registrado con esos datos.
    $sqlUsuarioExistente = "SELECT id_usuario FROM usuario WHERE username = :Username OR email = :Email";
    $sqlVerificarUsuarioExistente = $conn->prepare($sqlUsuarioExistente); //Preparo la consulta que verifica si existe usuario con esos datos

    if (!$sqlVerificarUsuarioExistente) {
        echo "Error en la consulta SQL de usuario";
        exit();
    }

    $sqlVerificarUsuarioExistente->bindParam(':Username', $fechaNacimiento, PDO::PARAM_STR);
    $sqlVerificarUsuarioExistente->bindParam(':Email', $email, PDO::PARAM_STR);

    $sqlVerificarUsuarioExistente->execute();
    $campos = $sqlVerificarUsuarioExistente->fetchAll(\PDO::FETCH_ASSOC);

    if (count($campos) > 0) {

        echo 'Nombre de usuario o email ya está en uso..';
        exit();

    } else {

        // Registro del usuario, acá inserto a la tabla usuario los datos que se llenaron en el registro.

        $sqlUsuario = "INSERT INTO usuario(id_rol, username, nomCompleto, email, password, fecha_nacimiento) VALUES (1, :Username, :NombreCompleto, :Email, :Password, :Fecha_Nac)";
        $stmtUsuario = $conn->prepare($sqlUsuario); //Preparo la consulta que me inserta un usuario

        if (!$stmtUsuario) {
            echo "Error en la consulta SQL de usuario";
            exit();
        }

        $stmtUsuario->bindParam(':Username', $username, PDO::PARAM_STR); //con esto nada mas establezco los valores que obtuve a la consulta
        $stmtUsuario->bindParam(':NombreCompleto', $nomCompleto, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':Email', $email, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':Password', $hashedPassword, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':Fecha_Nac', $fecha_nacimiento, PDO::PARAM_STR);

        if ($stmtUsuario->execute()) {

            header('Location: ../html_inicio_sesion/iniciarSesion.php'); //Devuelve al index.
            echo "Nuevo usuario registrado correctamente, puede loguearse";
            exit();

        } else {
            echo "Error al registrar nuevo usuario";
            exit();
        }
    }
}

?>

<?php include '../includes/header.php'?>
    <div class="pt-5"></div>

    <!-- Registrarse -->
    <section id="formulario" class="d-flex justify-content-center">

        <div class="col-12 col-md-6 col-lg-4">

            <h2 class="text-center">Crear nueva cuenta</h2>

            <form name="Nuevo Usuario" method="POST" action="">

                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario:</label>
                    <input id="username" type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su nombre de usuario" required>
                    <div class="form-text" id="error-username"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input id="password" type="password" class="form-control" name="password" maxlength="20" autocomplete="new-password" placeholder="Ingrese su contraseña" required>
                    <div class="form-text" id="error-password"></div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmar contraseña:</label>
                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" maxlength="20" autocomplete="new-password" placeholder="Ingrese su contraseña nuevamente" required>
                    <div class="form-text" id="error-confirm-password"></div>
                </div>

                <div class="mb-3">
                    <label for="nomCompleto" class="form-label">Nombre y Apellido:</label>
                    <input id="nomCompleto" type="text" class="form-control" name="nomCompleto" placeholder="Ingrese su nombre completo" required>
                    <div class="form-text" id="error-nomCompleto"></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
                    <div class="form-text" id="error-email"></div>
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                    <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" min="18" placeholder="Ingrese su fecha de nacimiento" required>
                    <div class="form-text" id="error-fecha_nacimiento"></div>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <input id="borrar" type="reset" class="btn btn-secondary" value="Borrar">
                    <button type="submit" class="btn btn-success">Registrarse</button>
                </div>

            </form>

        </div>

    </section>

    <div class="pt-2"></div>

<?php include '../includes/footer.php'?>

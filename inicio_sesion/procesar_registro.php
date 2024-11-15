<?php
require_once '../includes/conec_db.php';

session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    header('Content-Type: application/json');

    $username = isset($_POST["username"]) ? $_POST["username"] : NULL;
    $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
    $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : NULL;
    $nomCompleto = isset($_POST["nomCompleto"]) ? $_POST["nomCompleto"] : NULL;
    $email = isset($_POST["email"]) ? $_POST["email"] : NULL;
    $fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : NULL;
    $id_pais = isset($_POST["id_pais"]) ? $_POST["id_pais"] : NULL;
    
        if (empty($username) || empty($password) || empty($confirm_password) || empty($nomCompleto) || empty($email) || empty($fecha_nacimiento) || empty($id_pais)) {
            $errors[] = 'Por favor, complete todos los campos requeridos para registrar un nuevo usuario:';
            
        }

//contraseña
        if ((empty($password)) || (trim($password) === '') || (empty($confirm_password)) || (trim($confirm_password) === '')) {
            $errors[] = 'Debe completar el campo de contaseña y confirmar contraseña';
        }else{
        
            if (strlen($password) < 8 || strlen($password) > 16 )
            {
                $errors[] = 'Las contraseñas deben ser de 8 a 16 carateres.';
            }
            if ($password != $confirm_password) {
                $errors[] = 'Las contraseñas ingresadas no coinciden.';
            }
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
//nombre
        if ((empty($nomCompleto)) || (trim($nomCompleto) === '')) {
            $errors[] = 'Debe ingresar un nombre';
        } else {
            $palabras = explode(' ', $nomCompleto);
            if (count($palabras) != 2) {
                $errors[] = 'Formato de nombre incorrecto: debe estar conformado por un nombre y un apellido.';
            }
        }   

//usario - mail

        if ((empty($username)) || (trim($username) === '')) {
            $errors[] = 'Debe ingresar un nombre de usuario';
        }else{

            if (strlen($username) < 6 || strlen($username) > 12)
            {
                $errors[] = 'El campo username debe tener entre 6 a 12 caracteres';
            }

            $usernameRegex = "/^[a-z-0-9]+$/"; 

            if (!preg_match($usernameRegex, $username)) {
                $errors[] = 'El username solo permite letras y numeros';
            } 
        }

        if ((empty($email)) || (trim($email) === '')){
            $errors[] = 'Debe ingresar un correo electronico';
        }else{
            $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

            if (!preg_match($emailRegex, $email)) {
                $errors[] = 'Formato de mail invalido';
            }
        }

        $sqlUsuarioExistente = "SELECT id_usuario FROM usuarios WHERE username = :Username OR email = :Email OR google_email = :Email";
        $sqlVerificarUsuarioExistente = $conn->prepare($sqlUsuarioExistente);
        if (!$sqlVerificarUsuarioExistente) {
            error_log('Error en la consulta SQL de usuario');
            exit();
        }
        $sqlVerificarUsuarioExistente->bindParam(':Username', $username, PDO::PARAM_STR);
        $sqlVerificarUsuarioExistente->bindParam(':Email', $email, PDO::PARAM_STR);
        $sqlVerificarUsuarioExistente->execute();
        $campos = $sqlVerificarUsuarioExistente->fetchAll(PDO::FETCH_ASSOC);
        if (count($campos) > 0) {
            $errors[] = 'El nombre de usuario o el email ya están en uso.';
        }
        
//pais
        if (empty($id_pais)) {
            $errors[] = 'Debe seleccionar un país de la lista';
        }

//fecha
        if (empty($fecha_nacimiento)) {
            $errors[] = 'Debe ingresar una fecha de nacimiento';
        }
        


        if (empty($errors)) { //no hay errores
            $sqlUsuario = "INSERT INTO usuarios(username, nom_completo, email, password, fecha_nacimiento, id_pais, foto_usuario) VALUES (:Username, :NombreCompleto, :Email, :Password, :Fecha_Nac, :id_pais, :foto_usuario)";
            $stmtUsuario = $conn->prepare($sqlUsuario);

            if (!$stmtUsuario) {
                error_log('Error en la consulta SQL de usuario');
                $errors[] = 'Error en la consulta SQL de usuario';
                echo json_encode(['success' => false, 'errors' => $errors]);
                exit();
            }

            $foto_usuario = "../fotos_usuario/default/perfil-default.jpg";
            $stmtUsuario->bindParam(':Username', $username, PDO::PARAM_STR);
            $stmtUsuario->bindParam(':NombreCompleto', $nomCompleto, PDO::PARAM_STR);
            $stmtUsuario->bindParam(':Email', $email, PDO::PARAM_STR);
            $stmtUsuario->bindParam(':Password', $hashedPassword, PDO::PARAM_STR);
            $stmtUsuario->bindParam(':Fecha_Nac', $fecha_nacimiento, PDO::PARAM_STR);
            $stmtUsuario->bindParam(':id_pais', $id_pais, PDO::PARAM_INT);
            $stmtUsuario->bindParam(':foto_usuario',$foto_usuario,PDO::PARAM_STR);
            
            if ($stmtUsuario->execute()) {

                $id_usuario = $conn->lastInsertId();

                $_SESSION['id'] = $id_usuario;
                $_SESSION['nomCompleto'] = $nomCompleto;
                $_SESSION['nomUsuario'] = $username;
                $rol= 1;

                $sqlUsuarioRol = "INSERT INTO roles_usuarios(id_rol, id_usuario) VALUES (:id_rol, :id_usuario)";
                $stmtUsuarioRol = $conn->prepare($sqlUsuarioRol);
                $stmtUsuarioRol->bindParam(':id_rol', $rol, PDO::PARAM_STR);
                $stmtUsuarioRol->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                $stmtUsuarioRol->execute();

                $_SESSION['rol'] = $rol;
                

                echo json_encode([
                    'success' => true,
                    'nuevo_usuario_id' => $id_usuario
                ]);
                

            } else {
                error_log('Error al crear el usuario.');
                $errors[] = 'Error al crear el usuario.';
                echo json_encode(['success' => false, 'errors' => $errors]);
            }
        } else {
            echo json_encode(['success' => false, 'errors' => $errors]);
        }
}
?>

<?php
session_start();
require_once ('../includes/conec_db.php'); // Conexión a la base de datos

if (!isset($_SESSION['google_id'])) {
    header("Location: ../index/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $googleId = $_SESSION['google_id'];
    $googleEmail = $_SESSION['google_email'];
    $googleNombreCompleto = $_SESSION['nom_completo'];
    $googleFoto = $_SESSION['foto_usuario'];

    $username = isset($_POST["username"]) ? $_POST["username"] : NULL;
    $fechaNacimiento = isset($_POST["fecha_nac"]) ? $_POST["fecha_nac"] : NULL;
    $paisUsuario = isset($_POST["pais"]) ? $_POST["pais"] : NULL;

    if (empty($username) || empty($fechaNacimiento) || empty($paisUsuario)) {
        echo json_encode([
            'success' => false,
            'message' => 'Datos incompletos..'
        ]);
        exit();
    }
    
    // Verificar si el usuario ya está registrado en la base de datos
    $sql = "SELECT id_usuario FROM usuarios WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado == null){
    
        $sqlUsuario = "INSERT INTO usuarios(username, nom_completo, foto_usuario, google_id, google_email, id_pais, fecha_nacimiento) VALUES (:username, :nombre_completo, :foto_usuario, :googleID, :googleEMAIL, :pais, :fecha_nac)";
        $stmtUsuario = $conn->prepare($sqlUsuario);
    
        $stmtUsuario->bindParam(':username', $username, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':nombre_completo', $googleNombreCompleto, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':foto_usuario', $googleFoto, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':googleID', $googleId, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':googleEMAIL', $googleEmail, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':pais', $paisUsuario, PDO::PARAM_STR);
        $stmtUsuario->bindParam(':fecha_nac', $fechaNacimiento, PDO::PARAM_STR);
        
        if ($stmtUsuario->execute()) {
    
            $nuevoUserID = $conn->lastInsertId();
            unset($_SESSION['google_id']);
            unset($_SESSION['google_email']);
            unset($_SESSION['nom_completo']);
            unset($_SESSION['foto_usuario']);
            
            $_SESSION['id'] = $nuevoUserID;
            $_SESSION['nomUsuario'] = $username;
            $_SESSION['nomCompleto'] = $googleNombreCompleto;

            $rol= 2;

                $sqlUsuarioRol = "INSERT INTO roles_usuarios(id_rol, id_usuario) VALUES (:id_rol, :id_usuario)";
                $stmtUsuarioRol = $conn->prepare($sqlUsuarioRol);
                $stmtUsuarioRol->bindParam(':id_rol', $rol, PDO::PARAM_STR);
                $stmtUsuarioRol->bindParam(':id_usuario', $nuevoUserID, PDO::PARAM_STR);
                $stmtUsuarioRol->execute();

                $_SESSION['rol'] = $rol;

            echo json_encode(['success' => true]);
    
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error al registrar datos.'
            ]);
        }
    
    }else{
    
        echo json_encode([
            'success' => false,
            'message' => 'El nombre de usuario ya está en uso..'
        ]);
    }

}else{
    echo json_encode([
        'success' => false,
        'message' => 'Error en la petición..'
    ]);
}

?>
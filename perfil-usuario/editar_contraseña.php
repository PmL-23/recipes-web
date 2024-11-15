<?php
require_once('../includes/conec_db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos JSON de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);
    
    $ContraseñaActual = $data['ContraseñaActual'] ?? null;
    $NuevaContraseña = $data['NuevaContraseña'] ?? null;
    $ConfirmaciónNuevaContraseña = $data['ConfirmaciónNuevaContraseña'] ?? null;
    $IDUsuario = $data['IDUsuario'] ?? null;

    //$ConfirmaciónNuevaContraseña='asdasdasdasdasdasdasdasd';
    if ($ConfirmaciónNuevaContraseña != $NuevaContraseña ) {
        echo json_encode(['success' => false, 'error' => 'Las nuevas contraseñas no coinciden']);
        exit;
    }

    if (strlen($NuevaContraseña) < 8) {
        echo json_encode(['success' => false, 'error' => 'La contraseña nueva debe tener al menos 5 caracteres.']);
        exit;
    }

    if (strlen($ContraseñaActual) > 16) {
        echo json_encode(['success' => false, 'error' => 'La contraseña actual debe tener al menos 5 caracteres.']);
        exit;
    }

    if (!is_numeric($IDUsuario)) {
        echo json_encode(['success' => false, 'error' => 'ID de usuario no válido.']);
        exit;
    }

    //$resultado1 = $modelo->consultar($IDUsuario, $ContraseñaActual, $ContraseñaNueva);
    //$resultado = $modelo->ActualizarContraseñaUsuario($IDUsuario, $ContraseñaActual, $NuevaContraseña);
    //$resultado = $modelo->consultar($email, $ContraseñaActual);

    try {
        $sql = 'SELECT password FROM usuarios WHERE id_usuario = :idusuario';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idusuario', $IDUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($ContraseñaActual, $usuario['password'])) {
            unset($usuario['password']);

            if($ContraseñaActual == $NuevaContraseña){
                return 'La contraseña ingresada ya esta en actual uso para esta cuenta.';
            }
            else{
                
                try {
                    $hashNuevaContraseña = password_hash($NuevaContraseña, PASSWORD_DEFAULT);
        
                    // Actualizamos la contraseña en la base de datos
                    $updateSql = 'UPDATE usuarios SET password = :passwordNueva WHERE id_usuario = :idusuario';
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bindParam(':passwordNueva', $hashNuevaContraseña, PDO::PARAM_STR);
                    $updateStmt->bindParam(':idusuario', $IDUsuario, PDO::PARAM_INT);
                    $updateStmt->execute();
                    $resultado = true;
                //return true; 
                } catch (PDOException $e) {    
                    //return $e->getMessage();
                }
            }
        }
        else {
            //return false; // Usuario no encontrado o contraseña incorrecta
            $resultado = false;
        }
    }
    catch (PDOException $e) {
        //return $e->getMessage();
    }

    // Comprobación de éxito o error
    if ($resultado === true) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $resultado]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>

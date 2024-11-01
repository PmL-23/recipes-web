<?php 
session_start();
include '../includes/conec_db.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $email = $_POST['email'] ?? NULL;
    $password = $_POST['password'] ?? NULL;

    if (!isset($email)) {
        $errors[] = "Campo email no fue enviado";
    }
    if (!isset($password)) {
        $errors[] = "Campo password no fue enviado";
    }

    if ((is_null($email) || empty($email)) || (is_null($password) || empty($password))) {
        $errors[] = "Por favor, complete los campos requeridos para iniciar sesión";
    }

    if (empty($errors)) {
        $queryCheckLogin = "SELECT * FROM usuarios WHERE email = :email OR username = :email";
        $resultadoQuery = $conn->prepare($queryCheckLogin);
        $resultadoQuery->bindParam(':email', $email);
        $resultadoQuery->execute();
        $row = $resultadoQuery->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['nomCompleto'] = $row['nom_completo'];
                $_SESSION['nomUsuario'] = $row['username'];
                $_SESSION['id'] = $row['id_usuario'];
                echo json_encode(['success' => true]);
                exit;
            } else {
                $errors[] = "Acceso inválido. Email, usuario o contraseña no válidos"; 
                //no dar info precisa
            }
        } else {
            $errors[] = "Acceso inválido. Email, usuario o contraseña no válidos";
        }
    }

    echo json_encode(['success' => false, 'errors' => $errors]);

}

?>

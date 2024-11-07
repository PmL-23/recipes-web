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

                $fechaYHoraActual = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
                $FechaHoraFormateada = $fechaYHoraActual->format('Y-m-d H:i:s');

                if ( ($row['estad_suspendido'] == NULL) || (($row['estad_suspendido'] < $FechaHoraFormateada) && ($row['estad_suspendido'] != '0000-00-00 00:00:00')) ) {

                    $_SESSION['nomCompleto'] = $row['nom_completo'];
                    $_SESSION['nomUsuario'] = $row['username'];
                    $_SESSION['id'] = $row['id_usuario'];
                    echo json_encode(['success' => true]);
                    exit;

                }else if ($row['estad_suspendido'] == '0000-00-00 00:00:00'){

                    $errors[] = "Su cuenta se encuentra suspendida de forma permanente.";

                }else{

                    $errors[] = "Su cuenta se encuentra suspendida hasta el ".$row['estad_suspendido'];
                }
                

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

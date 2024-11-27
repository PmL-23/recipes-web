<?php
require_once '../../includes/conec_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $query = "SELECT id_etiqueta, titulo FROM etiquetas";
        $stm = $conn->prepare($query);
        $stm->execute();
        $Etiquetas = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($Etiquetas, JSON_PRETTY_PRINT);
    
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
else{
    echo json_encode(['success' => false, 'message' => 'Metodo de solicitud no permitido']);
}

?>
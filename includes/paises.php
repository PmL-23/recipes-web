<?php
$query = "SELECT * FROM paises WHERE id_pais != 11";
$stm = $conn->prepare($query);
$stm->execute();
$paises = $stm->fetchAll(PDO::FETCH_ASSOC);

?>
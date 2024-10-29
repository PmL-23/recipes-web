<?php

require_once('conec_db.php');

$query = "SELECT * FROM razones";
$stm = $conn->prepare($query);
$stm->execute();
$razonesReporte = $stm->fetchAll(PDO::FETCH_ASSOC);

?>
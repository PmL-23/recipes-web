<?php
$query = "SELECT * FROM paises";
$stm = $conn->prepare($query);
$stm->execute();
$paises = $stm->fetchAll(PDO::FETCH_ASSOC);
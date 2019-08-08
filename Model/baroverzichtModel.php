<?php
//Leg connectie
include('connection.php');
$connection = new connection();

//Laad het overzicht voor de bar in
$query = $connection->connect()->prepare('SELECT * FROM bestellingen WHERE drank_voltooid = 0
                                                   AND dranknummer != 0');
$query->execute();
$results = $query->fetchAll();

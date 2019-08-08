<?php
//Leg connectie
include('connection.php');
$connection = new connection();

//Laad alle bestellingen voor de keuken in
$query = $connection->connect()->prepare('SELECT * FROM bestellingen WHERE gerecht_voltooid = 0
                                                   AND gerechtsnummer != 0');
$query->execute();
$results = $query->fetchAll();
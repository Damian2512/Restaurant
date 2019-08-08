<?php
//Dit onderdeel activeert de barbestelling
//Leg connectie
include('connection.php');
$connection = new connection();

//Update query
$query = $connection->connect()->prepare('UPDATE bestellingen SET drank_voltooid = 1
                                                   WHERE bestellingsnummer = :bestellingsnummer');
$exec = $query->execute(array(
    ':bestellingsnummer' => $_GET['id']
));

//Check of het geactiveerd is
if($exec) {
    header('location: ../View/baroverzicht.php');
} else {
    echo 'Niks gebeurd.';
}
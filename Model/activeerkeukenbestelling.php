<?php
//Dit onderdeel activeert de keukenbestelling
//Leg de connectie
include('connection.php');
$connection = new connection();

//Update in de DB
$query = $connection->connect()->prepare('UPDATE bestellingen SET gerecht_voltooid = 1
                                                   WHERE bestellingsnummer = :bestellingsnummer');
$exec = $query->execute(array(
    ':bestellingsnummer' => $_GET['id']
));

//Check of het geactiveerd is
if($exec) {
    header('location: ../View/keukenoverzicht.php');
} else {
    echo 'Niks gebeurd.';
}
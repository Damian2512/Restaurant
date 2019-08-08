<?php
//Dit onderdeel activeert de reservering
//Leg de connectie
include('connection.php');
$connection = new connection();

//Update in de DB
$query = $connection->connect()->prepare('UPDATE reserveringen SET reservering_gebruikt = 1
                                                   WHERE reserveringsnummer = :reserveringsnummer');
$exec = $query->execute(array(
    ':reserveringsnummer' => $_GET['id']
));

//Check of het geaccepteerd is
if($exec) {
    header('location: ../View/reserveringsoverzicht.php');
} else {
    echo 'Niks gebeurd.';
}
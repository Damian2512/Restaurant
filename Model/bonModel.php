<?php
//Leg de connectie
include_once('connection.php');
$connection = new connection();

//Zoek tafelnummer
$search = isset($_POST['tafelnummer']) ? $_POST['tafelnummer'] : '';

//Check of er op de knop is gedrukt
if (isset($_POST['submit'])) {
    //Selecteer de bestellingen
    $query = $connection->connect()->prepare('SELECT * FROM bestellingen WHERE gerecht_voltooid = 1 
                                                   AND drank_voltooid = 1 
                                                   AND bestelling_afgerond = 0
                                                   AND tafelnummer LIKE :tafelnummer');
    $exec = $query->execute(array(
        ':tafelnummer' => $search
    ));
    $results = $query->fetchAll();
//Check of het geaccepteerd is
    if ($exec) {
        var_dump($results);
        //header('location: ../View/bon.php');
    }
}
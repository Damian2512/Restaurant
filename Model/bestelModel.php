<?php
//Leg de connectie
include_once('connection.php');
$connection = new connection();

//Haal gerechten op
$query = $connection->connect()->prepare('SELECT * FROM gerechten WHERE gang >= 5');
$query->execute();
$results = $query->fetchAll();

//Haal dranken op
$drank_query = $connection->connect()->prepare('SELECT * FROM gerechten WHERE gang < 5');
$drank_query->execute();
$drank_results = $drank_query->fetchAll();

//Check of er op de knop is gedrukt
if (isset($_POST['submit'])) {
    //Zet variabelen als er niks gebeurd
    $gerechten = isset($_POST['gerechtsnummer']) ? $_POST['gerechtsnummer'] : '';
    $toevoegingen = isset($_POST['toevoeging']) ? $_POST['toevoeging'] : '';
    $dranken = isset($_POST['dranknummer']) ? $_POST['dranknummer'] : '';

    //Array to string voor dranken
    if(!empty($dranken)) {
        $drank = implode(', ', $dranken);
    } else {
        $drank = 0;
    }

    //Array to string voor gerechten
    if(!empty($gerechten)) {
        $gerecht = implode(', ', $gerechten);
    } else {
        $gerecht = 0;
    }

    //Array to string voor toevoeginen
    if(!empty($toevoegingen)) {
        $toevoeging = implode(', ', $toevoegingen);
    } else {
        $toevoeging = 0;
    }

    //Insert de data
    $sql = $connection->connect()->prepare('INSERT INTO bestellingen (gerechtsnummer, dranknummer, toevoeging, tafelnummer)
                                                     VALUES (:gerechtsnummer, :dranknummer, :toevoeging, :tafelnummer)');
    $sql->execute(array(
        ':gerechtsnummer' => $gerecht,
        ':dranknummer' => $drank,
        ':toevoeging' => $toevoeging,
        ':tafelnummer' => $_POST['tafelnummer']
    ));
    header('location: ../View/bestellingen.php');
}
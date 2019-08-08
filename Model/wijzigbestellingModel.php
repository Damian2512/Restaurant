<?php
//Maak connectie met DB
include('connection.php');
$connection = new connection();

//Laad bestellingen in
$query = $connection->connect()->prepare('SELECT * FROM bestellingen WHERE bestelling_afgerond = 0');
$query->execute();
$bestelling_results = $query->fetchAll();
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';

//Update bestellingen
if($submit) {
    $query = $connection->connect()->prepare('UPDATE bestellingen
                                                       SET gerechtsnummer = :gerechtsnummer');
    $exec = $query->execute(array(
        ':gerechtsnummer' => $_POST['gerechten']
    ));

    //Check of het geaccepteerd is
    if($exec) {
        header('location: ../View/wijzigbestelling.php');
    }
}
<?php
session_start();
//Maak connectie met DB
include('connection.php');
$connection = new connection();

//Reserveringen doorvoeren naar de database
if (isset($_POST['submit'])) {
    $_SESSION['reservering'] = true;
    //Check of alles is ingevoerd
    if (!empty($_POST['naam']) && !empty($_POST['datum']) && !empty($_POST['tijd']) && !empty($_POST['personen']) && !empty($_POST['telefoonnummer'])) {
        $query = $connection->connect()->prepare('INSERT INTO reserveringen (naam, datum, tijd, personen, telefoonnummer)
                                              VALUES (:naam, :datum, :tijd, :personen, :telefoonnummer)');

        //Check of er een openstaande reservering is.
        $check_reservering = $connection->connect()->prepare('SELECT * FROM reserveringen WHERE reservering_gebruikt = 0
                                                               AND telefoonnummer = :telefoonnummer');
        $check_reservering->execute(array(
            ':telefoonnummer' => $_POST['telefoonnummer']
        ));

        //Als er een openstaande reservering is, zet false
        if ($check_reservering->rowCount() >= 1) {
            $_SESSION['reservering'] = false;
            $_SESSION['reservering_error'] = 'Er is al een openstaande reservering op deze naam';
        } else {
            //Anders true en execute
            $_SESSION['reservering'] = true;
            $_SESSION['reservering_error'] = '';
            $exec = $query->execute(array(
                ':naam' => $_POST['naam'],
                ':datum' => $_POST['datum'],
                ':tijd' => $_POST['tijd'],
                ':personen' => $_POST['personen'],
                ':telefoonnummer' => $_POST['telefoonnummer']
            ));
        }

        if ($exec) {
            $select_row = $connection->connect()->prepare('SELECT reserveringsnummer FROM reserveringen ORDER BY reserveringsnummer DESC LIMIT 1');
            $select_row->execute();
            $select_results = $select_row->fetchAll();
            foreach ($select_results as $select_result) {
                header('location: ../View/reserveringstafel.php?id=' . $select_result[0]);
            }
            $_SESSION['datum'] = $_POST['datum'];
            $_SESSION['tijd'] = $_POST['tijd'];
        } else {
            header('location: ../View/reserveringen.php');
        }
    } else {
        header('location: ../View/reserveringen.php');
    }
}

if (isset($_SESSION['datum']) && isset($_SESSION['tijd'])) {
    $check_tafels = $connection->connect()->prepare('SELECT tafelnummer FROM reserveringen 
                                                          WHERE reservering_gebruikt = 0
                                                          AND datum = :datum
                                                          AND tijd = :tijd');
    $check_tafels->execute(array(
        ':datum' => $_SESSION['datum'],
        ':tijd' => $_SESSION['tijd']
    ));
    $tafel_results = $check_tafels->fetchAll();
}

if (isset($_POST['submit_tafel'])) {
    $tafel_query = $connection->connect()->prepare('UPDATE reserveringen
                                                             SET tafelnummer = :tafelnummer
                                                             WHERE reserveringsnummer = :reserveringsnummer');
    $executed = $tafel_query->execute(array(
        ':reserveringsnummer' => $_GET['id'],
        ':tafelnummer' => $_POST['tafelnummer']
    ));

    if ($executed) {
        session_destroy();
        header('location: ../View/reserveringsoverzicht.php');
    } else {
        echo 'er is iets fout gegeaan';
    }
}

$tafel = array();
for ($i = 1; $i <= 50; $i++) {
    $tafel[] = $i;
}

$reservering_overzicht = $connection->connect()->prepare('SELECT * FROM reserveringen WHERE reservering_gebruikt = 0');
$reservering_overzicht->execute();
$reserveringen = $reservering_overzicht->fetchAll();

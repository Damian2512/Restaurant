<?php

class getters
{
    //Verander gerechtnummer naar gerechtnaam
    public function getGerecht($gerechtsnummer)
    {
        include_once('connection.php');
        $connect = new connection();

        $query = $connect->connect()->prepare('SELECT gerechtsnaam FROM gerechten WHERE gerechtsnummer = :gerechtsnummer');
        $query->execute(array(
            ':gerechtsnummer' => $gerechtsnummer
        ));
        $result = $query->fetchAll();

        foreach ($result as $gerechten) {
            $naam = $gerechten['gerechtsnaam'];
        }
        return $naam;
    }

    //Verander gerechtnummer naar gerechtprijs
    public function getPrijs($nummer)
    {
        include_once('connection.php');
        $connect = new connection();

        $query = $connect->connect()->prepare('SELECT gerechtsprijs FROM gerechten WHERE gerechtsnummer = :gerechtsnummer');
        $query->execute(array(
            ':gerechtsnummer' => $nummer
        ));
        $result = $query->fetchAll();

        foreach ($result as $gerechten) {
            $prijs = $gerechten['gerechtsprijs'];
        }
        return $prijs;
    }
}
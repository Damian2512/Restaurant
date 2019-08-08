<?php
//Maak connectie
include('connection.php');
$connection = new connection();

//Laad menu in
$query = $connection->connect()->prepare('SELECT * FROM gerechten ORDER BY gang');
$query->execute();
$gangen = $query->fetchAll();
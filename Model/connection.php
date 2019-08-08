<?php

class connection
{
    //Create connection to DB
    public function connect()
    {
        $connect = new PDO('mysql:host=localhost; dbname=restaurant_excellent', 'root', '');
        return $connect;
    }
}
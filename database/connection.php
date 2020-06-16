<?php

function connectDB(){
    static $connection;
 
    if(!isset($connection)) {
        $connection = connect();
    } 
 
    return $connection;
}

function connect(){
    try {
            $host = "127.0.0.1";
            $port = "3306"; 
            $dbname = "kesaprojekti"; 
            $user = "root"; 
            $password = ""; 
            $connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";
        error_log("Connecting to ".$connectionString );
        $pdo = new PDO($connectionString, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e){
        echo "Virhe tietokantayhteydessä: " . $e->getMessage();
        die();
    }
}
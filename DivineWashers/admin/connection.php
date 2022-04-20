<?php
 $host = "localhost";
 $db = "divinewashers";
 $user = "root";
 $password = "";

 try {
    $connection = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    //  foreach ($connection->query("SHOW DATABASES") as $row) {
    //      print_r($row);
    //  }
    //  die();
 } catch (PDOException $e){
    die("PDO Connection Error: " . $e->getMEssage());
 }
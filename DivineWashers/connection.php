<?php
 $host = "localhost";
 $database = "divinewashers(1)";
 $user = "root";
 $password = "";

 try {
    $connection = new PDO("mysql:=$host;dbname=$database", $user, $password);
   //  foreach ($connection->query("SHOW DATABASES") as $row) {
   //      print_r($row);
   //  }
   //  die();
 } catch (PDOException $e){
    die("PDO Connection Error: " . $e->getMEssage());
 }
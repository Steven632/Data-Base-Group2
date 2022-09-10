<?php
//session_start(); //
require_once 'connection.php'; 
if(isset($_GET) & !empty($_GET)){

	$sql = "INSERT INTO order FROM Product"; 	
    $result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
		//echo "User exits, create session";
        if($result){ //para el login de costumer
            //echo "User exits, create session";
		header("location: my-account.php");
        }
        else{
        header("location: index.php");
		//echo $email;
    }
    }
?>
<?php

	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
	header('location: login.php');
}

	if(isset($_GET) & !empty($_GET)){
		$id  =$_GET['costumerID'];
		$sql = "UPDATE costumer SET status='0' WHERE costumerID='$id'";
		//$res = mysqli_query($db, $sql);
		//$r = mysqli_fetch_assoc($res);

     
    
  //}
  header('location: customers.php');
	}
  ?>
  

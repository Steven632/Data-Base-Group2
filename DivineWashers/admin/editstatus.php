<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_GET['costumerID']) & !empty($_GET['costumerID'])){
		$id = $_GET['costumerID'];
		$sql = "UPDATE costumer SET status='0' WHERE costumerID=$id";
		$res = mysqli_query($db, $sql);
		$r = mysqli_fetch_assoc($res);
    if(mysqli_query($db, $sql)){
      header("location:customers.php");
    }
  }
  
	// 	if(!empty($r['prodImage'])){
	// 		if(unlink($r['prodImage'])){
	// 			$delsql = "DELETE FROM product WHERE productID=$id";
	// 			if(mysqli_query($db, $delsql)){
	// 				header("location:products.php");
	// 			}
	// 		}
	// 	}else{
	// 		$delsql = "DELETE FROM product WHERE productID=$id";
	// 			if(mysqli_query($db, $delsql)){
	// 				header("location:products.php");
	// 			}
	// 	}

	// }else{
	// 	header('location: products.php');
	// }

<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_GET['id']) & !empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT prodImage FROM product WHERE productID=$id";
		$res = mysqli_query($db, $sql);
		$r = mysqli_fetch_assoc($res);
		if(!empty($r['prodImage'])){
			if(unlink($r['prodImage'])){
				$delsql = "DELETE FROM product WHERE productID=$id";
				if(mysqli_query($db, $delsql)){
					header("location:products.php");
				}
			}
		}else{
			$delsql = "DELETE FROM product WHERE productID=$id";
				if(mysqli_query($db, $delsql)){
					header("location:products.php");
				}
		}

	}else{
		header('location: products.php');
	}

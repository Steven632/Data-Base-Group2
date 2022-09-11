<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_GET['productID']) & !empty($_GET['productID'])){
		$id = $_GET['productID'];
		$sql = "SELECT prodImage FROM product WHERE productID=$id";
		$res = mysqli_query($db, $sql);
		$r = mysqli_fetch_assoc($res);
		if(!empty($r['prodImage'])){
			if(unlink($r['prodImage'])){
				$delsql = "UPDATE product SET prodImage='' WHERE productID=$id";
				if(mysqli_query($db, $delsql)){
					header("location:editproduct.php?productID={$id}");
				}
			}else{
				$delsql = "UPDATE product SET prodImage='' WHERE productID=$id";
				if(mysqli_query($db, $delsql)){
					header("location:editproduct.php?productID={$id}");
				}
			}

	}else{
		$delsql = "UPDATE product SET prodImage='' WHERE productID=$id";
		if(mysqli_query($db, $delsql)){
			header("location:editproduct.php?productID={$id}");
		}
	}
}else{
	header("location:editproduct.php?productID={$id}");
}

<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_GET['id']) & !empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT prodImage FROM product WHERE id=$id";
		$res = mysqli_query($db, $sql);
		$r = mysqli_fetch_assoc($res);
		if(!empty($r['prodImage'])){
			if(unlink($r['prodImage'])){
				$delsql = "UPDATE product SET prodImage='' WHERE id=$id";
				if(mysqli_query($db, $delsql)){
					header("location:editproduct.php?id={$id}");
				}
			}else{
				$delsql = "UPDATE product SET prodImage='' WHERE id=$id";
				if(mysqli_query($db, $delsql)){
					header("location:editproduct.php?id={$id}");
				}
			}

	}else{
		$delsql = "UPDATE product SET prodImage='' WHERE id=$id";
		if(mysqli_query($db, $delsql)){
			header("location:editproduct.php?id={$id}");
		}
	}
}else{
	header("location:editproduct.php?id={$id}");
}

<?php
session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['costumer']);
	header('location: login.php');
?>

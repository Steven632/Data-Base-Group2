<?php
session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['costumer']);
	unset($_SESSION['costumerID']);
	unset($_SESSION['administrator']);
	header('location: login.php');
?>

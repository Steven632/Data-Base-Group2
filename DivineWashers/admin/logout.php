<?php
session_start();
session_destroy();
unset($_SESSION['administrator']);
header('location: login.php');
?>
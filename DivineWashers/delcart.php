<?php
session_start();
if(isset($_GET['productID']) & !empty($_GET['productID']))
{
  $id = $_GET['productID'];
  unset($_SESSION['cart'][$id]);
}

?>

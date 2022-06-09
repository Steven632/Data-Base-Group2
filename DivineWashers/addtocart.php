<?php
session_start();
if(isset($_GET) & !empty($_GET)){
    $id = $_GET['productID'];
    if(isset($_GET['prodInventory']) & !empty($_GET['prodInventory'])){$prodInventory = $_GET['prodInventory']; }
    $_SESSION['cart'][$id] = array("quantity" => $quant);
}else{
  header('location: index.php');
}
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?>

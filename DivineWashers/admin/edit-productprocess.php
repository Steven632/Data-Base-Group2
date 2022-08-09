<?php
require_once 'connection.php'; 
//include 'connection.php';

if(isset($_POST) & !empty($_POST)){
    $prodname = mysqli_real_escape_string($db, $_POST['productname']);
    $description = mysqli_real_escape_string($db, $_POST['productdescription']);
    $category = mysqli_real_escape_string($db, $_POST['productcategory']);
    //$price = mysqli_real_escape_string($db, $_POST['productprice']);
	//$sqlsearch = "SELECT *  FROM product WHERE prodName LIKE '%$search%'";
    $sql = "UPDATE product SET prodName='$prodname', prodDesc='$description', prodImage='$filepath' WHERE 'id' = '$id'";
    //echo $search;
	//confirm($sqlsearch);
	//$result = mysqli_result($db, $sql);
	//$count = mysqli_num_rows($result);
	//if($count >= 1){ //$count ==1
        //if(mysqli_num_rows($sqlsearch) >=1) { //error dice que debe ser type mysqli_result			
	//echo "User exits, create session";
		header('location: editproduct.php');       
	
	
}
?>
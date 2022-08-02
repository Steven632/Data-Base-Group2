<?php
require_once 'connection.php'; 
//include 'connection.php';
if(isset($_POST) & !empty($_POST)){
	$search = $_POST['prodName'];
	$sql = "SELECT COUNT(prodName) AS 'counter' FROM product WHERE prodName LIKE '%$search%'";
    echo $search;
	$result = mysqli_query($db, $sql);
	//$count = mysqli_num_rows($result);
	//if($count >= 1){ //$count ==1
        if(mysqli_num_rows($sql) >=1) {
		//echo "User exits, create session";
		header('location: product-list.php?id=' . $search);       
	}else{
		header('location: index.php?not_found');
	}
}

?>
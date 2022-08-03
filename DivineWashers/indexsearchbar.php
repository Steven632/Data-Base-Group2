<?php
require_once 'connection.php'; 
//include 'connection.php';
if(isset($_POST) & !empty($_POST)){
	$search = $_POST['prodName'];
	$sqlsearch = "SELECT COUNT(prodName) AS 'counter' FROM product WHERE prodName LIKE '%$search%'";
    echo $search;
	//confirm($sqlsearch);
	//$result = mysqli_result($db, $sql);
	//$count = mysqli_num_rows($result);
	//if($count >= 1){ //$count ==1
        //if(mysqli_num_rows($sqlsearch) >=1) { //error dice que debe ser type mysqli_result
			if($sqlsearch >=1) {
		//echo "User exits, create session";
		header('location: product-list.php?id=' . $search);       
	}else{
		header('location: index.php?not_found');
	}
}
?>
<!-- lo que busca cuando lleva hacia la pagina -->
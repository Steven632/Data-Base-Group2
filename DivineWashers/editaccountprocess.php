<?php
require_once 'connection.php'; 
//include 'connection.php';

if(isset($_POST) & !empty($_POST)){
    $costumerfirstName = mysqli_real_escape_string($db, $_POST['costumerfirstName']);
    $costumerlastName = mysqli_real_escape_string($db, $_POST['costumerlastName']);
    $costumerEmail = mysqli_real_escape_string($db, $_POST['costumerEmail']);
    $phoneNum = mysqli_real_escape_string($db, $_POST['phoneNum']);
    
    //$address = mysqli_real_escape_string($db, $_POST['address']);
    //$price = mysqli_real_escape_string($db, $_POST['productprice']);
	//$sqlsearch = "SELECT *  FROM product WHERE prodName LIKE '%$search%'";
    $sql= "UPDATE costumer SET costumerfirstName='$costumerfirstname', costumerlastName='$costumerlastname', ,costumerEmail='$costumerEmail', phoneNum='$phoneNum' WHERE uid = '$uid'";//address = '$address'
    //echo $search;
	//confirm($sqlsearch);
	//$result = mysqli_result($db, $sql);
	//$count = mysqli_num_rows($result);
	//if($count >= 1){ //$count ==1
        //if(mysqli_num_rows($sqlsearch) >=1) { //error dice que debe ser type mysqli_result			
	//echo "User exits, create session";
		header('location: my-account.php');       
	
}
?>
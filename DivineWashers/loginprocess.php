<?php
//session_start(); //
require_once 'connection.php'; 
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($db, $_POST['costumerEmail']);
	$password = $_POST['costumerPassword'];
	
	$sql = "SELECT * FROM costumer WHERE costumerEmail='$email' AND costumerPassword='$password'";
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);
	$adminemail = mysqli_real_escape_string($db, $_POST['costumerEmail']);
	$adminpassword = $_POST['costumerPassword'];
	$adminsql ="SELECT * FROM administrator WHERE admiEmail='$adminemail' AND admiPassword='$adminpassword'";

	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);

	$adminresult = mysqli_query($db, $adminsql);
	$admincount = mysqli_num_rows($adminresult);

	if($count == 1){ //para el login de costumer
		//echo "User exits, create session";
		$_SESSION['costumer'] = $email; // was costumerEmail
		$_SESSION['costumerID'] = $r['costumerID'];
		header("location: checkout.php");
		//echo $email;

	}else if($admincount == 1){ //para el login de administrador
		$_SESSION['administrator'] = $adminemail; // was costumerEmail
		header("location: admin/login.php");

	}else{
		//$fmsg = "Invalid Login Credentials";
		header("location: login.php?message=Invalid_Credentials");
		
	}
}
?>

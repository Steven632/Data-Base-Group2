<?php
//session_start();
require_once 'connection.php'; 
if(isset($_POST) & !empty($_POST)){
	$email = filter_var($_POST['costumerEmail'], FILTER_SANITIZE_EMAIL); //ORIGINAL
	//$email = mysqli_real_escape_string($db, $_POST['costumerEmail']); //TEST
	$password = $_POST['costumerPassword']; //ORIGINAL
	echo $r['costumerPassword'];
	// $password = hash($password);
	//$password = md5($_POST['costumerPassword']); //TEST
	 $sql = "SELECT * FROM costumer WHERE costumerEmail='$email'"; //ORIGINAL
    //$sql = "SELECT * FROM costumer WHERE costumerEmail='$email' AND costumerPassword='$password'"; //TEST
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);
	if($count == 1){		
		if(password_verify($password, $r['costumerPassword'])){ //here	
			//echo "User exits, create session";

			$_SESSION['customer'] = $email;
			$_SESSION['customerid'] = $r['id'];
			//$_SESSION['costumer'] = $email;
			//$_SESSION['costumerID'] = $r['id'];
			header("location: checkout.php");		
			
		}else{
			//$fmsg = "Invalid Login Credentials";
			header("location: login.php?message=1"); //existe en costumer	
			//header("location: index.php"); 
		}
	}else{
		header('location: login.php?message=2'); //no existe en costumer
	}
}
?>
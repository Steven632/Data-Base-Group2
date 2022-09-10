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

// if(isset($_POST) & !empty($_POST)){
// 	$email = filter_var($_POST['costumerEmail'], FILTER_SANITIZE_EMAIL); //ORIGINAL
// 	//$email = mysqli_real_escape_string($db, $_POST['costumerEmail']); //TEST
// 	$password = $_POST['costumerPassword']; //ORIGINAL
// 	echo $r['costumerPassword'];
// 	// $password = hash($password);
// 	//$password = md5($_POST['costumerPassword']); //TEST
// 	 $sql = "SELECT * FROM costumer WHERE costumerEmail='$email'"; //ORIGINAL
//     //$sql = "SELECT * FROM costumer WHERE costumerEmail='$email' AND costumerPassword='$password'"; //TEST
// 	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
// 	$count = mysqli_num_rows($result);
// 	$r = mysqli_fetch_assoc($result);
// 	if($count == 1){		
// 		if(password_verify($password, $r['costumerPassword'])){ //here	
// 			//echo "User exits, create session";

// 			$_SESSION['customer'] = $email;
// 			$_SESSION['customerid'] = $r['id'];
// 			//$_SESSION['costumer'] = $email;
// 			//$_SESSION['costumerID'] = $r['id'];
// 			header("location: checkout.php");		
			
// 		}else{
// 			//$fmsg = "Invalid Login Credentials";
// 			header("location: login.php?message=1"); //existe en costumer	
// 			//header("location: index.php"); 
// 		}
// 	}else{
// 		header('location: login.php?message=2'); //no existe en costumer
// 	}
// }
?>

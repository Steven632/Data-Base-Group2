<?php 
//session_start();
require_once 'connection.php'; 
if(isset($_POST) & !empty($_POST)){
	$email = filter_var($_POST['costumerEmail'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['costumerPassword'];
	$sql = "SELECT * FROM costumer WHERE costumerEmail='$email' AND costumerPassword='$password'";
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);

	if($count == 1){
		if(password_verify($password, $r['costumerPassword'])){ //here
			//echo "User exits, create session";
			$_SESSION['costumer'] = $email;
			$_SESSION['costumerID'] = $r['id'];
			header("location: checkout.php");
		}else{
			//$fmsg = "Invalid Login Credentials";
			header("location: login.php?message=1");
		}
	}else{
		header("location: login.php?message=2");
	}
}
?>

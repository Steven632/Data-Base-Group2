<?php 
require_once 'connection.php'; 
if(isset($_POST) & !empty($_POST)){
	//$email = mysqli_real_escape_string($connection, $_POST['email']);
	$email = filter_var($_POST['costumerEmail'], FILTER_SANITIZE_EMAIL);
	$password = $_POST['costumerPassword'];
	$costumerfirstName = $_POST['costumerfirstName'];
	$costumerlastName = $_POST['costumerlastName'];
	$phoneNum = $_POST['phoneNum'];
	//$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	echo $sql = "INSERT INTO costumer (costumerEmail, costumerPassword, costumerfirstName, costumerlastName, phoneNum) VALUES ('$email', '$password', '$costumerfirstName', '$costumerlastName', '$phoneNum')";
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));
	if($result){
		//echo "User exits, create session";
		$_SESSION['costumer'] = $email;
		$_SESSION['costumerID'] = mysqli_insert_id($db);
		header("location: checkout.php");
	}else{
		//$fmsg = "Invalid Login Credentials";
		header("location: login.php?message=2");
	}
}

?>

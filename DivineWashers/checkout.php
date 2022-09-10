<?php
	ob_start();
	// session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['costumer']) & empty($_SESSION['costumer'])){
		header('location: login.php');
	}
include 'inc/header.php'; 
// include 'inc/nav.php'; 
$uid = $_SESSION['costumerID'];
$cart = $_SESSION['cart'];

if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] == true){
		// $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		// $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$address2 = filter_var($_POST['street'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);

		$sql = "SELECT * FROM costumer WHERE costumerID=$uid";
		$res = mysqli_query($db, $sql);
		$r = mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);
		if($count == 1){
			//update data in usersmeta table
			$usql = "UPDATE costumer SET costumerfirstName='$fname', costumerlastName='$lname', address='$address', city='$city', state='$state',  zipCode='$zip', phoneNum='$phone' WHERE costumerID=$uid";
			$ures = mysqli_query($db, $usql) or die(mysqli_error($db));
			if($ures){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM product WHERE productID=$key";
					$ordres = mysqli_query($db, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($db, $iosql) or die(mysqli_error($db));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($db);
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$ordsql = "SELECT * FROM product WHERE productID=$key";
						$ordres = mysqli_query($db, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['productID'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (productID, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($db, $orditmsql) or die(mysqli_error($db));
						//if($orditmres){
							//echo "Order Item inserted redirect to my account page <br>";
						//}
					}
				}
				unset($_SESSION['cart']);
				header("location: my-account.php");
			}
		}else{
			//insert data in usersmeta table
			$isql = "INSERT INTO costumer (costumerfirstName, costumerlastName, address, city, state, ziCode, costumerID) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
			$ires = mysqli_query($db, $isql) or die(mysqli_error($db));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM product WHERE productID=$key";
					$ordres = mysqli_query($db, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($db, $iosql) or die(mysqli_error($db));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($db);
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$ordsql = "SELECT * FROM product WHERE productID=$key";
						$ordres = mysqli_query($db, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (productID, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($db, $orditmsql) or die(mysqli_error($db));
						//if($orditmres){
							//echo "Order Item inserted redirect to my account page <br>";
						//}
					}
				}
				unset($_SESSION['cart']);
				header("location: my-account.php");
			}

		}
	}

}

$sql = "SELECT * FROM costumer WHERE costumerID=$uid";
$res = mysqli_query($db, $sql);
$r = mysqli_fetch_assoc($res);
?>

	
	<!-- SHOP CONTENT -->
    <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
							<!-- <label class="">Country </label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select> -->
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($fname)){ echo $fname; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<!-- <label>Company Name</label>
							<input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>" type="text"> -->
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address" class="form-control" placeholder="Address" value="<?php if(!empty($r['address'])){ echo $r['address']; } elseif(isset($address)){ echo $address; } ?>" type="text">
							<div class="clearfix space20"></div>
							<input name="street" class="form-control" placeholder="Street" value="<?php if(!empty($r['street'])){ echo $r['street']; }elseif(isset($street)){ echo $street; } ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>City </label>
									<input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>" placeholder="State" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zip" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zipcode'])){ echo $r['zipcode']; }elseif(isset($zip)){ echo $zip; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input name="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['phone'])){ echo $r['phone']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">
						
					</div>
				</div>
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<!-- <table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount">£190.00</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount">£190.00</span></strong> </td>
					</tr>
				</tbody>
			</table> -->
            <?php
                             $total = 0;
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
                        $cartsql = "SELECT  * FROM Product where productID=$key";
						// $cartsql = "SELECT * FROM product WHERE productID=$key";
						$cartres = mysqli_query($db, $cartsql);
						$cartr = mysqli_fetch_assoc($cartres);
                        
 
					
				 ?>
            <?php 
				    $total = $total + ($cartr['price']*$value['quantity']);
                     } ?>
                             
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span> <?php echo $total; ?></span></p>
                                            <p>Shipping Cost<span>Free Shipping </span></p>
                                            <h2>Grand Total<span> <?php echo $total; ?></span></h2>
                                        </div>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
					
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="cod"><span>Cash On Delivery</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio2" class="css-checkbox" type="radio"><span value="cheque">Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio3" class="css-checkbox" type="radio"><span value="paypal">Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
					
				</div>
				<div class="space30"></div>
				
					<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
				
				<div class="space30"></div>
				<input type="submit" class="button btn-lg" value="Pay Now">
			</div>
		</div>		
</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

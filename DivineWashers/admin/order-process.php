<?php
	ob_start();
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php
if(isset($_POST) & !empty($_POST)){
		$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
		// $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$id = filter_var($_POST['orderID'], FILTER_SANITIZE_NUMBER_INT);

			echo $ordprcsql = "INSERT INTO 'order' (orderID, orderStatus,) VALUES ('$id', '$status')";
			$ordprcres = mysqli_query($db, $ordprcsql) or die(mysqli_error($db));
			if($ordprcres){
				$ordupd = "UPDATE 'order' SET orderStatus='$status' WHERE orderID=$id";
				if(mysqli_query($db, $ordupd)){
					header('location: orders.php');
				}
			}
}
?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Admin - Order Processing</h2>
						<!-- <p>Do you want to cancel Order?</p> -->
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Order Processing</h3>

				<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>

				<?php
					if(isset($_GET['orderID']) & !empty($_GET['orderID'])){
						$oid = $_GET['orderID'];
					}else{
						header('location: orders.php');
					}
					$ordsql = "SELECT * FROM 'order' WHERE orderID='$oid'";
					$ordres = mysqli_query($db, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['orderID']; ?>
						</td>
						<!-- <td>
							<?php echo $ordr['timestamp']; ?>
						</td> -->
						<td>
							<?php echo $ordr['orderStatus']; ?>			
						</td>
						<!-- <td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							INR <?php echo $ordr['totalprice']; ?>/-
						</td> -->
					</tr>
				<?php } ?>
				</tbody>
			</table>	

						<div class="space30"></div>
							<label class="">Order Status </label>
							<select name="status" class="form-control">
								<option value="">Select Status</option>
								<option value="In Progress">In Progress</option>
								<option value="Dispatched">Dispatched</option>
								<option value="Delivered">Delivered</option>
							</select>

							<div class="clearfix space20"></div>
							<label>Message :</label>
							<textarea class="form-control" name="message" cols="10"> </textarea>

					<input type="hidden" name="orderid" value="<?php echo $_GET['orderID']; ?>">		 
						<div class="space30"></div>
					<input type="submit" class="button btn-lg" value="Update Order Status">
					</div>
				</div>
				
			</div>
		
		</div>		
</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

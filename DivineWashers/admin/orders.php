<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode</th>
						<th>Order Placed On</th>
						<th>Operations</th>
					</tr> 
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT o.orderID, o.orderStatus, o.orderDate, c.costumerfirstName, c.costumerlastName FROM 'order' o JOIN costumer c WHERE o.orderID=c.costumerID ORDER BY o.orderID DESC";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['orderID']; ?></th>
						<td><?php echo $r['costumerfirstName']. " " . $r['costumerlastName']; ?></td>
						<!-- <td><?php echo $r['totalprice']; ?></td> -->
						<td><?php echo $r['orderStatus']; ?></td>
						<!-- <td><?php echo $r['paymentmode']; ?></td> -->
						<!-- <td><?php echo $r['timestamp']; ?></td> -->
						<td><a href="order-process.php?id=<?php echo $r['orderID']; ?>">Process Order</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>

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
						<th>Customer Mobile</th>
						<th>Customer Email</th>
						<!-- <th>Customer From</th> -->
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM costumer";
					// --  u JOIN usersmeta u1 WHERE u.id=u1.uid";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['costumerID']; ?></th>
						<td><?php echo $r['costumerfirstName'] . " " . $r['costumerlastName']; ?></td>
						<td><?php echo $r['phoneNum']; ?></td>
						<td><?php echo $r['costumerEmail']; ?></td>
						<!-- <td><?php echo $r['timestamp']; ?></td> -->
						
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
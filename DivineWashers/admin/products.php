<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}
?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Product ID</th>
						<th>Thumbnail</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM product";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['productID']; ?></th>
						<td><?php echo $r['prodName']; ?></td>
						<td><?php echo $r['productID']; ?></td>
						<td><?php if($r['prodImage']){ echo "Yes";}else{echo "No";} ?></td>
						<td><a href="editproduct.php?id=<?php echo $r['productID']; ?>">Edit</a> | <a href="delproduct.php?id=<?php echo $r['productID']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'footer.php' ?>

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
						<th>Product Name</th>
						<th>Product ID</th>
						<th>Thumbnail</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php  
                            // $sql = "SELECT * FROM Product, orderdetails WHERE Product.productID = Orderdetails.productID ";
                            $sql = "SELECT * FROM Product";
                            if(isset($_GET['productID']) & !empty($_GET['productID']))
                            {
                            $id= $_GET['productID'];
                            //$sql .= "WHERE =  $id";
                            }
                            $result = mysqli_query($db, $sql);
                            //$r = mysqli_fetch_assoc($result)
                            while($r = mysqli_fetch_assoc($result)){ 
                            
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
<?php include 'inc/footer.php' ?>

<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($db, $_POST['prodName']);
		$description = mysqli_real_escape_string($db, $_POST['prodDesc']);
		// $category = mysqli_real_escape_string($db, $_POST['productcategory']);
		// $price = mysqli_real_escape_string($db, $_POST['productprice']);


		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['prodImage']['name'];
			$size = $_FILES['prodImage']['size'];
			$type = $_FILES['prodImage']['type'];
			$tmp_name = $_FILES['prodImage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "img/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						$sql = "INSERT INTO product (prodName, prdDesc, productID, prodImage) VALUES ('$prodname', '$description', '$category', '$location$name')";
						$sql = "INSERT INTO orderdetails (prodPrice, prodQuantity) VALUES ('$price', '$quantity')";
						$res = mysqli_query($db, $sql);
						if($res){
							//echo "Product Created";
							header('location: products.php');
						}else{
							$fmsg = "Failed to Create Product";
						}
					}else{
						$fmsg = "Failed to Upload File";
					}
				}else{
					$fmsg = "Only JPG files are allowed and should be less that 1MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sql = "INSERT INTO product (prodName, prdDesc, productID) VALUES ('$prodname', '$description', '$category') AND INSERT INTO orderdetails (prodPrice, prodQuantity) VALUES ('$price', '$quantity')";
			$res = mysqli_query($db, $sql);
			if($res){
				header('location: products.php');
			}else{
				$fmsg =  "Failed to Create Product";
			}
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
				  <option value="">---SELECT CATEGORY---</option>
				  <?php 	
					$sql = "SELECT dryerCombo, frontLoad, portable, smartWifi, topLoad FROM product";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<option value="<?php echo $r['id']; ?>"><?php echo $r['prodName']; ?></option>
				<?php } ?>
				</select>
			  </div>
			  

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
			  </div>
			  <div class="form-group">
			    <label for="prodImage">Product Image</label>
			    <input type="file" name="prodImage" id="prodImage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>

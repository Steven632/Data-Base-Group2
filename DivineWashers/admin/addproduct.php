<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$prodbrand = mysqli_real_escape_string($db, $_POST['productbrand']);
		$prodname = mysqli_real_escape_string($db, $_POST['productname']);
		$description = mysqli_real_escape_string($db, $_POST['productdescription']);
		$dryerCombo = mysqli_real_escape_string($db, $_POST['dryerCombo']);
		$frontLoad = mysqli_real_escape_string($db, $_POST['frontLoad']);
		$topLoad = mysqli_real_escape_string($db, $_POST['topLoad']);
		$portable = mysqli_real_escape_string($db, $_POST['portable']);
		$smartWifi = mysqli_real_escape_string($db, $_POST['smartWifi']);
		$inventory = mysqli_real_escape_string($db, $_POST['inventory']);
		// $category = mysqli_real_escape_string($db, $_POST['productcategory']);
		$price = mysqli_real_escape_string($db, $_POST['productprice']);
		// $quantity = mysqli_real_escape_string($db, $_POST['productquantity']);


		if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['prodImage']['name'];
			$size = $_FILES['prodImage']['size'];
			$type = $_FILES['prodImage']['type'];
			$tmp_name = $_FILES['prodImage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "../img/"; 
					if(move_uploaded_file($tmp_name, $location.$name)){
						// $smsg = "Uploaded Successfully";
						// $sql = "INSERT INTO product (prodBrand, prodName, prdDesc, productID, prodImage) VALUES ('$prodbrand', $prodname', '$description',  '$location$name')";
						// $sql = "INSERT INTO orderdetails (prodPrice) VALUES ('$price')";
						$sql = "INSERT INTO product (prodBrand, prodName, prodDesc, prodImage, dryerCombo, frontLoad, topLoad, portable, smartWifi, prodInventory) VALUES ('$prodbrand', $prodname', '$description', '$location$name', '$dryerCombo', '$frontLoad', '$topLoad', '$portable', '$smartWifi', '$inventory')"; 
						$sql .= "INSERT INTO orderdetails (prodPrice) VALUES ('$price')";
						$res = mysqli_multi_query($db, $sql);
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

			// $sql = "INSERT INTO product (prodBrand, prodName, prdDesc, productID, dryerCombo, frontLoad, portable, smartWifi, topLoad) VALUES ('$prodbrand', $prodname', '$description','prodid') AND INSERT INTO orderdetails (prodPrice, prodQuantity) VALUES ('$price', '$quantity')";
			// $sql = "INSERT INTO product (prodBrand, prodName, prdDesc) VALUES ('$prodbrand', $prodname', '$description') AND INSERT INTO orderdetails (prodPrice, prodQuantity) VALUES ('$price', '$quantity')";
			$sql = "INSERT INTO product (prodBrand, prodName, prdDesc, prodImage) VALUES ('$prodbrand', $prodname', '$description', '$prodImage')";
			$sql .= "INSERT INTO orderdetails (prodPrice, prodQuantity) VALUES ('$price')";
			$res = mysqli_multi_query($db, $sql);
			if($res){
				header('location: products.php');
			}else{
				$fmsg =  "Failed to Create Products";
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
			    <label for="Productbrand">Brand</label>
			    <input type="text" class="form-control" name="productbrand" id="Productbrand" placeholder="Product Brand">
			  </div>

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
			    <!-- <select class="form-control" id="productcategory"> -->
				  <!-- <option value="">---SELECT CATEGORY---</option> -->
					<input type= "option" name="dryerCombo" value="1">Dryer Combo</option>
					<input type= "option" name="frontLoad" value="1">Front Load</option>
					<input type= "option" name="topLoad" value="1">Top Load</option>
					<input type= "option" name="portable" value="1">Portable</option>
					<input type= "option" name="smartWifi" value="1">Smart Wifi</option>



				  <!-- <?php 	
					$sql = "SELECT * FROM product";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
				<?php } ?>


					 <?php 	
					$sql = "SELECT dryerCombo, frontLoad, portable, smartWifi, topLoad FROM product";
					$res = mysqli_query($db, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?> 
					<option value="<?php echo $r['id']; ?>"><?php echo $r['dryerCombo'];  ?>Dryer Combo</option>
				<?php } ?> -->
				</select>
			  </div>
			  <div class="form-group">
			    <label for="inventory">inventory</label>
			    <input type="number" class="form-control" name="inventory"></textarea>
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

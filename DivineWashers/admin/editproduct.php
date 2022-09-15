<?php
	session_start();
	require_once 'connection.php';
	if(!isset($_SESSION['admiEmail']) & empty($_SESSION['admiEmail'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: products.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($db, $_POST['productname']);
		$description = mysqli_real_escape_string($db, $_POST['productdescription']);
		$category = mysqli_real_escape_string($db, $_POST['productcategory']);
		$price = mysqli_real_escape_string($db, $_POST['productprice']);
		$catid = mysqli_real_escape_string($db, $_POST['productcategory']);


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
					$filepath = $location.$name;
					if(move_uploaded_file($tmp_name, $filepath)){
						$smsg = "Uploaded Successfully";
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
			$filepath = $_POST['filepath'];
		}	
	
		$sql = "UPDATE product SET prodName='$prodname', prodDesc='$description', prodImage='$filepath', catid='$catid', price='$price' WHERE productID = '$id'";
		//$sql = "UPDATE orderdetails SET price='$price', WHERE 'id' = '$id'";
		$res = mysqli_query($db, $sql);
		if($res){
			$smsg = "Product Updated";
		}else{
			$fmsg = "Failed to Update Product";
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
			<!-- <?php 	
			
				$sql = "SELECT  * FROM Product where productID='$id'";
				$res = mysqli_query($db, $sql); 
				$r = mysqli_fetch_assoc($res); 
			?> -->
			<form method="post" enctype="multipart/form-data action="edit-productprocess.php>
			  <div class="form-group">
			  <input type="hidden" name="filepath" value="<?php echo $r['prodImage']; ?>">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name" value="<?php echo $r['prodName']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"><?php echo $r['prodDesc']; ?></textarea>
			  </div>

				<div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
			    <?php 	
					$catsql = "SELECT * FROM category";
					$catres = mysqli_query($db, $catsql); 
					while ($catr = mysqli_fetch_assoc($catres)) {
				?>
					<option value="<?php echo $catr['id']; ?>" <?php if( $catr['id'] == $r['catid']){ echo "selected"; } ?>><?php echo $catr['name']; ?></option>
				<?php } ?>
				</select>
			  </div>
			  

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price" value="<?php echo $r['price']; ?>">
			  </div>
				<div class="form-group">
			    <label for="productimage">Product Image</label>
			    <?php if(isset($r['prodImage']) & !empty($r['prodImage'])){ ?>
			    <br>
			    	<img src="<?php echo $r['prodImage'] ?>" widht="100px" height="100px">
			    	<a href="delprodimg.php?id=<?php echo $r['productID']; ?>">Delete Image</a>
			    <?php }else{ ?>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			    <?php } ?>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>

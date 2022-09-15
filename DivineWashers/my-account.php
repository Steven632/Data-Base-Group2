<?php

include 'connection.php';
$uid = $_SESSION['costumerID'];


// $cart = $_SESSION['cart'];
if(isset($_POST) & !empty($_POST)){
    $costumerfirstName = mysqli_real_escape_string($db, $_POST['costumerfirstName']);
    $costumerlastName = mysqli_real_escape_string($db, $_POST['costumerlastName']);
    $phoneNum = mysqli_real_escape_string($db, $_POST['phoneNum']);
    $costumerEmail = mysqli_real_escape_string($db, $_POST['costumerEmail']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    //$costumerPassword = mysqli_real_escape_string($db, $_POST['costumerPassword']);
    
    $sqlx = "UPDATE costumer SET costumerfirstName='$costumerfirstName', costumerlastName='$costumerlastName', phoneNum='$phoneNum',costumerEmail='$costumerEmail', address = '$address' WHERE costumerID = '$uid'";
	$resx = mysqli_query($db, $sqlx);
     //$rx = mysqli_fetch_assoc($res);
    
}     
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Divine Washers- My Account</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
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
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        divinewashers@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        787-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
                           
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.php" class="nav-item nav-link active">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                  <!-- <a href="wishlist.html" class="dropdown-item">Wishlist</a> -->
                                    <a href="login.php" class="dropdown-item">Login & Register</a>
                                    <a href="contact.php" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="login.php" class="dropdown-item">Login/Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/Divinewasherslogo1.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">

                        
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                             <!--<a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span> 
                            </a> -->
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Products</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                           
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                           
                            <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>

                           
                                                <th>Order No</th>
                                                <!-- <th>Product</th> -->
                                                <th>Date</th>
                                                <th>Price</th>                                           
                                                <th>Status</th>
                                                <!-- <th>Action</th> --> 
                                            </tr>
                                        </thead>                                      
                                        <tbody>
                                        <?php                                                                    
                                                                // foreach ($uid as $key => $value) {
                                                            //     //echo $key . " : " . $value['quantity'] ."<br>";
                                                            //     // $cartsql = "SELECT * FROM orders JOIN product where uid='$key'";
                                                            //     $ordsql = "SELECT * FROM orders JOIN product where uid='$key'";
                                                            //     // $cartsql = "SELECT * FROM product WHERE productID=$key";
                                                            //     // $cartres = mysqli_query($db, $cartsql);
                                                            //     $ordres = mysqli_query($db, $ordsql);
                                                            //     // $cartr = mysqli_fetch_assoc($cartres);           
                                                            //     $ordr = mysqli_fetch_assoc($ordres);
                                                            $ordsql = "SELECT * FROM orders JOIN orderitems WHERE orders.id=orderitems.orderid AND orders.uid=$uid";
                                                            $ordres = mysqli_query($db, $ordsql);
                                                            while($ordr = mysqli_fetch_assoc($ordres)){                                        
                                                         ?>
                                            <tr>
                                                <td><?php echo $ordr ['orderid']; ?></td>
                                                <!-- <td>Product Name</td> -->
                                                <!-- <td><?php echo $ordr ['prodName']; ?></td> -->
                                                <td><?php echo $ordr ['timestamp']; ?></td>
                                                <!--<td>$99</td>-->
                                                <td><span> <?php echo $ordr ['productprice']; ?></span></td>
                                                
                                                <td><?php echo $ordr ['orderstatus']; ?></td>
                                                <!-- <td><button class="btn">View</button></td> -->
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Payment Method</h4>
                                <div class="payment-methods">
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            
                                        </div>
                                    </div>
                                   <!--   <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Check Payment</label>
                                        </div>
                                        
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Direct Bank Transfer</label>
                                        </div>
                                        
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Cash on Delivery</label>
                                        </div>
                                        
                                    </div>
-->

                                </div>
                            
                                
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                
                                

                                <div class="row">
                                    <div class="col-md-6">

                                    <?php
                                    $sql = "SELECT * FROM costumer WHERE costumerID='$uid'"; //WHERE '$id' = '$costumerID' // WHERE $_GET[costumerID] = '$costumerID' ";  
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                        <h5>Payment Address</h5>   
    
                                        <!--<p>123 Payment Street, Los Angeles, CA</p> -->
                                        
                                        <p><?php echo $row['street']; ?> <?php echo $row['address']; ?> <?php echo $row['city']; ?> <?php echo $row['state']; ?></p>
                                       
                                        <!--<p>Mobile: 012-345-6789</p> -->
                                        <p>Phone number: <?php echo $row['phoneNum']; ?></p>
                                        
  
                                        <button class="btn">Edit Address</button>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <!--<p>123 Shipping Street, Los Angeles, CA</p> -->
                                        <p><?php echo $row['street']; ?> <?php echo $row['address']; ?> <?php echo $row['city']; ?> <?php echo $row['state']; ?></p>
                                        <!--<p> 787-11112-232323</p> -->
                                        <p><?php echo $row['phoneNum']; ?></p>

                                        <button class="btn">Edit Address</button>
                                        
                                    </div>
                                    
                                </div>
                            </div>


                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        

                                <h4>Account Details</h4>
                                <form method="post" enctype="multipart/form-data action="editaccountprocess.php>
                                <div class="row">
                                    <div class="col-md-6">
                                    <!--<input class="form-control" type="text" placeholder="First">-->
                                        <input class="form-control" type="text" name="costumerfirstName" id="costumerfirstName" placeholder="<?php echo $row['costumerfirstName']; ?>">                                                                                                          
                                       <!-- <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name" value="< ?php echo $r['prodName']; ?>">-->
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="costumerlastName" id="costumerlastName" placeholder="<?php echo $row['costumerlastName']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"name="costumerEmail" id="costumerEmail" placeholder="<?php echo $row['costumerEmail']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="<?php echo $row['phoneNum']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder=""<?php echo $row['address']; ?>">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        </form>
                                        <br><br>
                                       
                                    </div>
                                  
                                </div>
                                

                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Arecibo, Puerto Rico</p>
                                <p><i class="fa fa-envelope"></i>washerscollections@gmail.com</p>
                                <p><i class="fa fa-phone"></i>787-345-6789</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href="https://twitter.com/?lang=es" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://es-la.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://pr.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/?hl=es-la" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Payment Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

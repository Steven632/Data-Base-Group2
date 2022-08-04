<?php
include 'connection.php';


//$sql = "SELECT productID, prodName, prodImage FROM Product WHERE (SELECT productID FROM product WHERE prodName = $'prodName')"; 
//while($row = mysqli_fetch_array($result))
//{
//    $prodName = $row[0];
//    $prodImage =$row[0];
//}
//echo $row['productID'];
//echo $row['prodName'];
//echo $row['prodImage'];
?>

<?php //prueba de search bar
if(isset($_GET['$search'])){
    $query = query("SELECT * FROM products WHERE prodname = '$search'");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Divine Washers-Products</title>
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
                            <a href="product-list.php" class="nav-item nav-link active">Products</a>
                            <!--<a href="product-detail.php" class="nav-item nav-link">Product Detail</a> -->
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.php" class="nav-item nav-link">My Account</a>
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
                           <!-- <a href="addtocart.php?id< ?php echo $r['productID']; ?>" class="btn cart">-->
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
                    <li class="breadcrumb-item active">Products</li>
                    <li class="breadcrumb-item"><a href="product-detail.html">Product Detail</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                       <!-- <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    
                                                        <a href="product-list.php?sp" class="dropdown-item">$100 to $300</a>
                                                        <a href="product-list.php?sp1" class="dropdown-item">$301 to $400</a>
                                                        <a href="product-list.php?sp2" class="dropdown-item">$401 to $500</a>
                                                        <a href="product-list.php?sp3" class="dropdown-item">$501 to $600</a>
                                                        <a href="product-list.php?sp4" class="dropdown-item">$601 to $700</a>
                                                        <a href="product-list.php?sp5" class="dropdown-item">$701 to $800</a>
                                                        <a href="product-list.php?sp6" class="dropdown-item">$801 to $900</a>
                                                        <a href="product-list.php?sp7" class="dropdown-item">$901 to $999+</a>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php  
                            //$sql = "SELECT  *  FROM Product, orderdetails WHERE Product.productID = Orderdetails.productID"; //product list muestra precio pero no brands escogidos
                            $sql = "SELECT  * FROM Product JOIN orderdetails ON Product.productID = orderdetails.productID";           //muestra brands escogifod pero no precios     

                            if(isset($_GET['id']) & !empty($_GET['id']))
                            {
                            $id = $_GET['id'];                        
                            $sql .= " WHERE prodBrand='$id'"; 
                            }  
                            //SORT DE CATEGORIA-----------------------------------
                            if(isset($_GET['cat']) & !empty($_GET['cat']))
                            {
                            $cat = $_GET['cat'];                        
                            $sql .= " WHERE portable='1'";               
                            } 

                            if(isset($_GET['catq']))
                            {
                            $catq = $_GET['catq'];                        
                            $sql .= " WHERE frontLoad='1'";                            
                            } 

                            else if(isset($_GET['catw']))
                            {
                            $catw = $_GET['catw'];                        
                            $sql .= " WHERE topLoad='1'";                            
                            } 

                            else if(isset($_GET['cate']))
                            {
                            $cate = $_GET['cate'];                        
                            $sql .= " WHERE smartWifi='1'";                            
                            } 

                            else if(isset($_GET['catr']))
                            {
                            $catr = $_GET['catr'];                        
                            $sql .= " WHERE dryerCombo='1'";                            
                            } 
                            //SORT DE PRECIOS-----------------------------------
                            else if(isset($_GET['sp']))
                            {
                            $sp = $_GET['sp'];                        
                            $sql .= " WHERE prodPrice > '100' and prodPrice < '300'";                            
                            } 

                            else if(isset($_GET['sp1']))
                            {
                            $sp1 = $_GET['sp1'];                        
                            $sql .= " WHERE prodPrice > '301' and prodPrice < '400'";                            
                            } 

                            else if(isset($_GET['sp2']))
                            {
                            $sp2 = $_GET['sp2'];                        
                            $sql .= " WHERE prodPrice > '401' and prodPrice < '500'";                            
                            } 

                            else if(isset($_GET['sp3']))
                            {
                            $sp3 = $_GET['sp3'];                        
                            $sql .= " WHERE prodPrice > '501' and prodPrice < '600'";                            
                            } 

                            else if(isset($_GET['sp4']))
                            {
                            $sp4 = $_GET['sp4'];                        
                            $sql .= " WHERE prodPrice > '601' and prodPrice < '700'";                            
                            } 

                            else if(isset($_GET['sp5']))
                            {
                            $sp5 = $_GET['sp5'];                        
                            $sql .= " WHERE prodPrice > '701' and prodPrice < '800'";                            
                            } 

                            else if(isset($_GET['sp6']))
                            {
                            $sp6 = $_GET['sp6'];                        
                            $sql .= " WHERE prodPrice > '801' and prodPrice < '900'";                            
                            } 

                            else if(isset($_GET['sp7']))
                            {
                            $sp7 = $_GET['sp7'];                        
                            $sql .= " WHERE prodPrice > '901' and prodPrice < '99999'";                            
                            } 


                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_assoc($result)){ 
                            ?>
                            <!--abre ventana de producto-->
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <!--<a href="#">Costway Portable Mini</a>-->                              
                                        <a ><?php echo $row["prodName"]; ?></a>
                                        <!-- <a > < ?php echo $row['prodName']; ?> </a> -->
                                        
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                     <!--  <img src="img/costwayamazon450.png" alt="Product Image"> -->
                                    <img src= "<?php echo $row['prodImage']; ?>" >

                                        </a>
                                        <div class="product-action">
                                            <!-- <a href="cart.php"><i class="fa fa-cart-plus"></i></a>   -->
                                            <a href="addtocart.php?id=<?php echo $row ['productID'];?>"> <i class="fa fa-cart-plus"></i></a>                                           
                                            <!--<a href="#"><i class="fa fa-heart"></i></a>-->
                                            <a href="product-detail.php?id=<?php echo $row['productID']; ?>"> <i class="fa fa-search"></i></a> 
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span><?php echo $row['prodPrice']; ?> </h3>
                                        <!-- -->
                                        <!--<h3><span>$</span> < ?php echo $row['prodPrice']; ?> </h3> -->
                                        
                                        <a class="btn" href="checkout.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        <!--<a href="cart.html" class="nav-item nav-link">Cart</a>-->
                                    </div>
                                </div>
                            </div>
                            <!-- cierra ventana de producto-->
                            <?php
                            }
                          ?>

                        
                           
                          </div>
                        
                         <!-- Pagination Start -->
                         <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>

                                    <!--<li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                     </div>           
                    
                     <!-- Side Bar Start -->
                     <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">

                                <!-- CATEGORY -->
<?php

                                $sqlc = "SELECT * FROM Product";           //muestra brands escogifod pero no precios         
                                $resultc = mysqli_query($db, $sqlc);
                               $catr = mysqli_fetch_assoc($resultc)
?>                                     
                               <li class="nav-item">
                                    <li><a href="product-list.php?cat=<?php echo $catr['portable']; ?>" ><i class="fa fa-microchip"></i>Portable</a></li>
                                    <a href="product-list.php?catq=<?php echo $catr['frontLoad']; ?>" ><i class="fa fa-microchip"></i>Frontload</a>
                                    <a href="product-list.php?catw=<?php echo $catr['topLoad']; ?>" ><i class="fa fa-microchip"></i>Topload</a>
                                    <a href="product-list.php?cate=<?php echo $catr['smartWifi']; ?>" ><i class="fa fa-microchip"></i>Smartwifi</a>
                                    <a href="product-list.php?catr=<?php echo $catr['dryerCombo']; ?>" ><i class="fa fa-microchip"></i>Dryercombo</a>
                                </li>
                                </ul>
                            </nav>
                        </div>
                                   
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                            <!-- BUSCAR POR BRAND -->
                           <?php
                            $brandsqls ="SELECT distinct prodBrand FROM product "; //Tengo una idea mas o menos de como hacer esto. asignar valor brand y compara para mostrar luego
                            $brandres = mysqli_query($db, $brandsqls);
                            while($brandrs = mysqli_fetch_assoc($brandres)){                                                       
                                ?>                                        
                                <li><a href="product-list.php?id=<?php echo $brandrs ['prodBrand'];?>"><?php echo $brandrs ['prodBrand'];?></li>
                                <?php
                                }                       
                                ?>
                         
                            </ul>
                        </div>

                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/kenmore.png" alt=""></div>
                    <div class="brand-item"><img src="img/samsung.png" alt=""></div>
                    <div class="brand-item"><img src="img/whirlpool.png" alt=""></div>
                    <div class="brand-item"><img src="img/logoLG.png" alt=""></div>
                    <div class="brand-item"><img src="img/logoGE.png" alt=""></div>
                    <div class="brand-item"><img src="img/logoMidea.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        
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

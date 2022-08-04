<?php
include 'connection.php';

//if (isset($_GET['productID']) & !empty($_GET['productID'])) 
if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
    //echo $id;
    //$psql = "SELECT * FROM Product WHERE productID = '$id'"; 
                //$psql = "SELECT * FROM Product, orderdetails WHERE productID = '$id' OUTER JOIN Product.productID = orderdetails.productID"; \
                $psql =" SELECT * FROM Product, orderdetails WHERE product.productID = '$id' and orderdetails.productID='$id' ";
    //echo $psql;
    $presult = mysqli_query($db, $psql);
    $prow = mysqli_fetch_assoc($presult);
}
//$result=$connection->query($sql);
/////$resultcheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Divine Washers-Products Details</title>
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
                            <a  class="nav-item nav-link active">Product Detail</a>
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
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
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
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src= "<?php echo $prow['prodImage']; ?>" alt="Product Image">
                                        <!--<img src="img/lgfronttop.jpg" alt="Product Image"> -->
                                        
                                    </div>

                                  <!--  <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="< ?php //echo $prow['prodImage']; ?>" alt="Product Image"></div>                                                              
                                    </div> -->

                                </div>
                           
                                 
                                <div class="col-md-7">
                                    <div class="product-content"> 
                                    <div class="title"><h2> <?php echo $prow['prodName']; ?> </h2></div> <!--<a href="product-detail.php?id=" < ?php echo $row['productID']; ?> > < ?php echo $row['prodName']; ? > </a> -->
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <!--<p>$199.99 <span>$1,299.99</span></p> -->
                                            <p>$<?php echo $prow['prodPrice']; ?></p>
                                        </div>

                                        <form method="get" action="addtocart.php"> 
                                        <div class="quantity">
                                       
                                            <h4>Quantity:</h4>
                                           
                                            <div class="qty">
                                           
                                            
                                                <!--<button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button> -->
                                                
                                                
                                                <!--<input type="text" value="1" name="quant"> -->
                                                <input type="hidden" name="id" value="<?php echo $prow['productID'];?>">
                                                <input type="text" name="quant" placeholder="1">
         
                                            </div>
                                       
                                         <div class="action">
                        <!--<a class="btn" href="addtocart.php?id=< ?php echo $prow ['productID'];?>"><i class="fa fa-shopping-cart"></i>Add to Cart</a>-->
                                             <input type="submit" class="button btn-small" value="Add To Cart" style="width :100px; width:100px"> 
                                             
                                            <!--<a href="addtocart.php?id=< ?php echo $row ['productID'];?>"> <i class="fa fa-cart-plus"></i></a> -->

                                            <a class="btn" href="checkout.php"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                            
                                        </div>   
                                         </form>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                        <?php echo $prow['prodDesc']; ?>
                                        </p>
                                    </div>
                                   
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Sensor Dry</li>
                                            <li>AAFA Certified LG Washer</li>
                                            <li>ThinQ® Technology with Proactive Customer Care</li>
                                            <li>Ventless Condensing Drying</li>
                                            <li>Built-In Intelligence - AI Fabric Sensor</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                            <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                This all in one unit is so convenient.  No forgetting laundry in the washer and having to rewash again  because it sat too long.  I love the convenience.  Still learning all of its features.
                                            </p>
                                        </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="row form">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea placeholder="Review"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                
                            <?php  
                            $sql = "SELECT * FROM Product, orderdetails WHERE Product.productID = Orderdetails.productID ";
                            if(isset($_GET['productID']) & !empty($_GET['productID']))
                            {
                            $id= $_GET['productID'];
                            //$sql .= "WHERE =  $id";
                            }
                            $result = mysqli_query($db, $sql);
                            //$r = mysqli_fetch_assoc($result)
                            while($r = mysqli_fetch_assoc($result)){ 
                            
                            ?>
                                
                               <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                            <a href="product-detail.php?id=<?php echo $r["productID"]; ?>"><?php echo $r["prodName"]; ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                
                            </div>
                            <div class="product-image">
                                <a href="product-detail.php">
                                    <!--<img src="img/lgWifiCombo.png" alt="Product Image"> -->
                                    <img src= "<?php echo $r['prodImage']; ?>" alt="Product Image"> 
                                </a>
                                <div class="product-action">
                                    <a href="addtocart.php?id=<?php echo $r['productID']; ?>"><i class="fa fa-cart-plus"></i></a>                                 
                                    <!--<a href="#"><i class="fa fa-heart"></i></a>-->
                                    <a href="product-detail.php?id=<?php echo $r['productID']; ?>"><i class="fa fa-search"></i></a>
                                    
                                </div>
                            </div>
                            <div class="product-price">
                                <!-- <h3><span>$</span>999.99</h3> -->
                                <h3><span>$</span><?php echo $r['prodPrice']; ?> </h3>
                                <a class="btn" href="checkout.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                            <?php
                            }
                            ?>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">

                              <?php  $sqlc = "SELECT * FROM Product";           //muestra brands escogifod pero no precios         
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
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
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
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
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

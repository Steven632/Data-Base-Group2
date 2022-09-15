<?php
include 'connection.php';
//Cuantos resultados encontro (NUMERO)
if(isset($_GET['id'])){
$search_r = $_GET['id'];
$countquery = query("SELECT COUNT(prodName) AS 'counter' FROM product WHERE prodname LIKE '%$search_r%'");
confirm($countquery);
$Count_r = fetch_array($countquery);
}
?>

<?php



function getSearchData($search){
    $query = query("SELECT *  FROM product WHERE prodName LIKE '%$search%'");
    confirm($query);
    return($query);
}

function ShowSearchData($search_r){
    $query = query("SELECT *  FROM product WHERE prodName LIKE '%$search_r%'");
    confirm($query);
    return($query);
}
if(isset($_GET['$search_r'])){
$info = ShowSearchData($search_r);
while($row = fetch_array($info)){
    $prodName = $row['prodName'];
}
}
//}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Divine Washers</title>
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
        <link href="css/style.css">

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

                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
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

                        
<form class="search-form" method="post" action="indexsearchbar.php" > <!-- name="" -->
                           
                         <input type="text" placeholder="Search" name="prodName">
                          <!--//<button type="submit"> <i class="fa fa-search"></i></button> <! --name=""-->
                        <button  type="submit"><i class="fa fa-search"></i></button>
</form>





                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                             
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
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                  <li class="nav-item">
                                    
                                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a>
                                </li>

                       
                  <?php
                    $brandsqls ="SELECT distinct prodBrand FROM product"; //Tengo una idea mas o menos de como hacer esto. asignar valor brand y compara para mostrar luego
                    $brandres = mysqli_query($db, $brandsqls);
                    while($brandrs = mysqli_fetch_assoc($brandres)){                                                       
                   ?>                                       
                     <li class="nav-item">
                        <a href="product-list.php?id=<?php echo $brandrs ['prodBrand'];?>"><i class="fa fa-shopping-bag"></i><?php echo $brandrs ['prodBrand'];?> </a>
                        <?php
                   }                       
                   ?>  
                    </li>
                     
                                  

                                </ul>
                        </nav>
                     </div>
                    <!--Slider
                 -->
                     <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <!-- slider-->
                            <?php  
                            // $sql = "SELECT * FROM Product, orderdetails WHERE Product.productID = Orderdetails.productID ";
                            $sql = "SELECT * FROM Product";
                            if(isset($_GET['productID']) & !empty($_GET['productID']))
                            {
                            $id= $_GET['productID'];
                            }
                            $result = mysqli_query($db, $sql);
                            while($r = mysqli_fetch_assoc($result)){                             
                            ?>

                            <div class="header-slider-item">
                                <!-------------------------ARREGLAR FOTOS------------------------>
                                <!--<img src="img/samsung_front_2.png" alt="Slider Image"/> -->
                                <img src="admin/<?php echo $r['prodImage'];?>" > 
                                <!-- img src= "< ?php echo $r['prodImage']; ?>" SIZE ESTAN MAL --> 
                                <div class="header-slider-caption">
                                    <p><?php echo $r["prodName"]; ?></p>                                 
                                    <a class="btn" href="product-detail.php?id=<?php echo $r['productID']; ?>"><i class="fa fa-shopping-cart"></i>Shop Now</a>      
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                
                        </div>
                      </div>
                     <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/DivineLogo.png" />
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/kenmore.png" alt=""></div>
                    <div class="brand-item"><img src="img/samsung.png" alt=""></div>
                    <div class="brand-item"><img src="img/whirlpool.png" alt=""></div>
                    <div class="brand-item"><img src="img/logoLG.png" alt=""></div>
                    <div class="brand-item"><img src="img/logoGE.png" alt=""></div>
                    <div class="brand-item"><img src="img/haier.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                               
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/CostwayPortableCompactTwin.png" />
                            
                                <p>Costway Portable Compact Twin</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="img/costwayAmazon.png" />
                            
                                <p> Costway Portable Compact Mini </p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="img/Costway.png" />
                            
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="img/LgLogo.png" />
                           
                                
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="img/lgWifiCombo.png"  />
                          
                                <p>LG Smart Wifi Washer Combo - White</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="img/lgWifiComboGraphite.png" />
                            
                                <p>LG Smart Wifi Washer Combo - Graphite</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any questions</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">787-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        
        <!-- Featured Product Start, rotation -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">

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
<!--Productos de la base de datos-->
                    <div class="col-lg-3">
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
                                    <img src= "<?php echo $r['prodImage']; ?>"  alt="Product Image"> 
                                </a>
                                <div class="product-action">
                                    <a href="addtocart.php?id=<?php echo $r['productID']; ?>"><i class="fa fa-cart-plus"></i></a>                                 
                                    <!--<a href="#"><i class="fa fa-heart"></i></a>-->
                                    <a href="product-detail.php?id=<?php echo $r['productID']; ?>"><i class="fa fa-search"></i></a>
                                    
                                </div>
                            </div>
                            <div class="product-price">
                                <!-- <h3><span>$</span>999.99</h3> -->
                                <h3><span>$</span><?php echo $r['price']; ?> </h3>
                                <a class="btn" href="checkout.php"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                            ?>
<!--termina ventana de producto -->
                    
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Your email here">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
      
     
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
                                <li><a href="contact.php">About Us</a></li>
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

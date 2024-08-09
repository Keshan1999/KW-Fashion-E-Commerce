<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kwfashion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the "Men" category from the database
$sql = "SELECT product_id, proname, proprice, proimage FROM product WHERE procategory = 'Kids'";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/Kw.png" type="">
      <title>KW Fashion</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.html"><img width="100" src="images/Kw.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="men.php">Men</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="women.php">Women</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="kids.php">Kids</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <form class="form-inline">
                            <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                            <a href="cart.html" class="btn my-2 my-sm-0 nav_cart-btn">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <a href="useraccount.html" class="btn my-2 my-sm-0 nav_account-btn">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Men</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->

      <br><br><br>

      <div class="container">
         <div class="row">
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col shop-grid-6">
                <div class="productList">
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            <?php foreach ($products as $product): ?>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-2 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="productdetails.php?product_id=<?php echo $product['product_id']; ?>">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="<?php echo $product['proimage']; ?>" src="<?php echo $product['proimage']; ?>" alt="image" title="product">
                                        <!-- End image -->
                                    </a>
                                    <!-- end product image -->
                                    <!-- Start product button -->
                                    <form class="variants add" action="cart.html" method="post">
                                        
                                    </form>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="productdetails.html?product_id=<?php echo $product['product_id']; ?>"><?php echo $product['proname']; ?></a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">$<?php echo $product['proprice']; ?></span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
         </div>
      </div>
      
      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="100" src="images/Kw.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> No 25 Nawalapitiya rode Kandy</p>
                        <p><strong>TELEPHONE:</strong> +94 75 6372 332</p>
                        <p><strong>EMAIL:</strong> kwfashion@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="about.html">About</a></li>
                           <li><a href="product.html">Men</a></li>
                           <li><a href="product.html">Women</a></li>
                           <li><a href="contact.html">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="login.html">Login</a></li>
                           <li><a href="login.html">Register</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>ABOUT Us</h3>
                        <div class="information_f">
                          <p>We think individuality and exclusivity are the foundations of the future. We aim to democratize fashion and make timeless aesthetic available to all</p>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2024 All Rights Reserved By KW Fashion</p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>

<?php
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

// Fetch product details based on product_id
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$sql = "SELECT * FROM product WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $product = $result->fetch_assoc();
} else {
    echo "0 results";
    exit;
}

$conn->close();

// Clean the proprice value
$cleaned_price = preg_replace('/[^0-9.]/', '', $product['proprice']);
$price_float = floatval($cleaned_price);
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
      <link href="css/menproduct1.css" rel="stylesheet" />
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
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
                           <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="men.html">Men</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="women.html">Women</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="kids.html">Kids</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                              
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                               <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                           <a href="cart.html" class="btn  my-2 my-sm-0 nav_cart-btn">
                               <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                           </a>
                           <a href="useraccount.html" class="btn  my-2 my-sm-0 nav_account-btn">
                               <i class="fa fa-user" aria-hidden="true"></i>
                           </a>
                       </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
      </div>
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <br><br>
      <div class="product-details-container">
        <div class="product-image-container">
            <img src="<?php echo $product['proimage']; ?>" alt="Product Image" id="main-product-image">
        </div>
        <div class="product-info-container">
            <h1 class="product-title"><?php echo $product['proname']; ?></h1>
            <div class="product-price">
                <span class="sale-price">$<?php echo number_format($price_float, 2); ?></span>
            </div>
            <div class="product-description">
                <p><?php echo $product['prodescription']; ?></p>
            </div>
            <div class="product-options">
                <div class="option-group">
                    <label for="color-select">Color:</label>
                    <select name="color-select" id="color-select">
                        <option value="<?php echo $product['procolor']; ?>"><?php echo $product['procolor']; ?></option>
                    </select>
                </div>
                <div class="option-group">
                    <label for="size-select">Size:</label>
                    <select name="size-select" id="size-select">
                        <option value="<?php echo $product['prosize']; ?>"><?php echo $product['prosize']; ?></option>
                    </select>
                </div>
            </div>
            <div class="product-quantity">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" min="1" max="<?php echo $product['proquantity']; ?>" value="1">
            </div>
            <?php if ($product['proquantity'] > 0) { ?>
                <button type="submit" class="add-to-cart">Add to Cart</button>
            <?php } else { ?>
                <button type="button" class="sold-out" disabled>Sold Out</button>
            <?php } ?>
        </div>
    </div>
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
      <div class="cpy_">
         <p>© 2024 All Rights Reserved By KW Fashion</p>
      </div>
      <script src="js/productdetails.js"></script>
   </body>
</html>

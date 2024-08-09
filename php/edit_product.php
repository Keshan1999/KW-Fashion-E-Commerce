<?php
// Step 1: Connect to the database
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

$product = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update product details
    $product_id = $_POST['product_id'];
    $proname = $_POST['proname'];
    $procategory = $_POST['procategory'];
    $proprice = $_POST['proprice'];
    $proquantity = $_POST['proquantity'];
    $prodescription = $_POST['prodescription']; // Assuming description is a field in your table
    $procolor = $_POST['procolor']; // Assuming color is a field in your table
    $prosize = implode(',', $_POST['prosize']); // Assuming size is stored as a comma-separated string

    $sql = "UPDATE product SET proname='$proname', procategory='$procategory', proprice='$proprice', proquantity='$proquantity', prodescription='$prodescription', procolor='$procolor', prosize='$prosize' WHERE product_id=$product_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminproduct.php");
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    // Fetch product details for the given product_id
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM product WHERE product_id=$product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "No product found with the given ID";
        }
    } else {
        echo "No product ID provided";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link rel="stylesheet" href="admin/css/addproduct.css">
</head>
<body class="body">
    <header>
        <nav>
            <ul>
                <li>
                    <a href="dashboard.html" class="logo">
                        <div class="Mp">
                            <a class="logo" href="index.html"><img width="100" src="images/Kw.png" alt="#" /></a>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="product-listing">
            <h1 class="product-listing__title">Edit Product</h1>
            <?php if ($product): ?>
            <form class="product-listing__form" method="post" action="edit_product.php">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <div class="form-column">
                    <div class="form-field">
                        <label for="proname">Product Name:</label>
                        <input type="text" id="proname" name="proname" value="<?php echo $product['proname']; ?>" required>
                    </div>
                    <div class="form-field">
                        <label for="proprice">Price:</label>
                        <input type="text" id="proprice" name="proprice" value="<?php echo $product['proprice']; ?>" required>
                    </div>
                    <div class="form-field">
                        <label for="description">Description:</label>
                        <textarea id="description" name="prodescription" required><?php echo $product['prodescription']; ?></textarea>
                    </div>
                    <div class="form-field">
                        <label for="photos">Photos:</label>
                        <input type="file" id="photos" name="prophotos" multiple>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-field">
                        <label for="procategory">Category:</label>
                        <select id="procategory" name="procategory">
                            <option value="men" <?php if ($product['procategory'] == 'men') echo 'selected'; ?>>Men</option>
                            <option value="women" <?php if ($product['procategory'] == 'women') echo 'selected'; ?>>Women</option>
                            <option value="kids" <?php if ($product['procategory'] == 'kids') echo 'selected'; ?>>Kids</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="color">Color:</label><br>
                        <select id="color" name="procolor">
                            <option value="black" <?php if ($product['procolor'] == 'black') echo 'selected'; ?>>Black</option>
                            <option value="white" <?php if ($product['procolor'] == 'white') echo 'selected'; ?>>White</option>
                            <option value="red" <?php if ($product['procolor'] == 'red') echo 'selected'; ?>>Red</option>
                            <option value="gray" <?php if ($product['procolor'] == 'gray') echo 'selected'; ?>>Gray</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="size">Size:</label><br>
                        <input type="checkbox" id="size" name="prosize[]" value="S" <?php if (in_array('S', explode(',', $product['prosize']))) echo 'checked'; ?>> S
                        <input type="checkbox" id="size" name="prosize[]" value="M" <?php if (in_array('M', explode(',', $product['prosize']))) echo 'checked'; ?>> M
                        <input type="checkbox" id="size" name="prosize[]" value="L" <?php if (in_array('L', explode(',', $product['prosize']))) echo 'checked'; ?>> L
                    </div>
                    <div class="form-field">
                        <label for="proquantity">Quantity:</label><br>
                        <input type="number" id="proquantity" name="proquantity" value="<?php echo $product['proquantity']; ?>" min="1" required>
                    </div>
                </div>
                <div class="form-field">
                    <button type="submit" onclick="window.location.href='adminproduct.php'">Save</button>
                    <button type="button" onclick="window.location.href='admin.html'">Cancel</button>
                </div>
            </form>
            <?php else: ?>
                <p>Product details not available.</p>
            <?php endif; ?>
        </section>
    </main>
    <script src="admin/js/adminproduct.js"></script>
</body>
</html>

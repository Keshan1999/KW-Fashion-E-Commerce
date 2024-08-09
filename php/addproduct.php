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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['proname'];
    $price = $_POST['proprice'];
    $description = $_POST['prodescription'];
    $category = $_POST['proCategory'];
    $color = $_POST['procolor'];
    $size = isset($_POST['prosize']) ? implode(",", $_POST['prosize']) : '';
    $quantity = $_POST['proquantity'];

    // Handle file upload
    $imagePath = '';
    if (isset($_FILES['prophotos']) && $_FILES['prophotos']['error'] == 0) {
        $target_dir = "uploads/";
        
        // Check if the directory exists, if not, create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["prophotos"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["prophotos"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["prophotos"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit(); // Stop script execution
            }
        } else {
            echo "File is not an image.";
            exit(); // Stop script execution
        }
    }

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO product (proname, proprice, prodescription, procategory, procolor, prosize, proquantity, proimage) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssis", $name, $price, $description, $category, $color, $size, $quantity, $imagePath);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to addproduct.html if product added successfully
        header("Location: adminproduct.php");
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}
$conn->close();
?>

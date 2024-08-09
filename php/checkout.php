<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "kwfashion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert order details into the database
function insertOrder($orderData) {
    global $conn;

    $fullName = $conn->real_escape_string($orderData['o_name']);
    $email = $conn->real_escape_string($orderData['o_email']);
    $telephone = $conn->real_escape_string($orderData['o_phone_no']);
    $address = $conn->real_escape_string($orderData['o_address']);
    $city = $conn->real_escape_string($orderData['o_city']);
    $postcode = $conn->real_escape_string($orderData['o_postcode']);
    $country = $conn->real_escape_string($orderData['o_country']);
    $orderNotes = $conn->real_escape_string($orderData['o_notes']);
    $total = $conn->real_escape_string($orderData['o_total_price']);
    $productName = $conn->real_escape_string($orderData['o_product_name']);
    $price = $conn->real_escape_string($orderData['o_price']);
    $size = $conn->real_escape_string($orderData['o_size']);
    $o_quantity = $conn->real_escape_string($orderData['o_quantity']);

    $sql = "INSERT INTO order (o_name, o_email, o_phone, o_address, o_city, o_postcode, o_country, o_notes, o_total, o_product_name, o_price, o_size, o_quantity)
            VALUES ('$fullName', '$email', '$telephone', '$address', '$city', '$postcode', '$country', '$orderNotes', '$total', '$productName','$price','$size','$quantity' )";

    if ($conn->query($sql) === TRUE) {
        return "New order created successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Example order data (this should be replaced with actual data from your form)
$orderData = array(
    "fullName" => "John Doe",
    "email" => "johndoe@example.com",
    "telephone" => "1234567890",
    "address" => "123 Main St",
    "city" => "Springfield",
    "postcode" => "12345",
    "country" => "USA",
    "orderNotes" => "Please deliver between 5-6 PM",
    "total" => "100.00",
    "shipping" => "15.00"
);

// Insert the order
echo insertOrder($orderData);

// Close connection
$conn->close();
?>

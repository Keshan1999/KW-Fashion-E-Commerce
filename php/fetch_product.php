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

// Query to fetch product data
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Array to store fetched products
$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($products);
?>

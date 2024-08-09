<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kwfashion";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM admin_user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login successful
        echo "Login successful. Welcome, " . $email;
        header("Location: admin.html"); // Redirect to index.html
        exit(); // Stop further execution
    } else {
        // Login failed
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>
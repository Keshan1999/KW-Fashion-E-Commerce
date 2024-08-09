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

$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$csubject = $_POST['csubject'];
$cmessage = $_POST['cmessage'];

// Prepare and bind the statement
$stmt = $conn->prepare("INSERT INTO contact (cname, cemail, csubject, cmessage) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $cname, $cemail, $csubject, $cmessage);

// Execute the statement
if ($stmt->execute()) {
    // Data inserted successfully, redirect to home.html
    header("Location: home.html");
    exit(); // Make sure to exit after redirecting
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
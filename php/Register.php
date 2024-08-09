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

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to insert user data
    $stmt = $conn->prepare("INSERT INTO user (email, fname, lname, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $fname, $lname, $password);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful. Welcome, " . $email;

        // Log in the user
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Login successful
            echo "You have been automatically logged in.";
            header("Location: home.html"); // Redirect to index.html
            exit();
        } else {
            // Login failed
            echo "An error occurred during login.";
        }
    } else {
        // Registration failed
        echo "An error occurred during registration.";
    }

    $stmt->close();
}

$conn->close();
?>
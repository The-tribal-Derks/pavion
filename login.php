<?php
// Database configuration
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginANDsignupPHP1";

// Create a new database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$login = $_POST["login"];
$password = $_POST["password"];

// Query to check user credentials
$sql = "SELECT * FROM users WHERE (email='$login' OR phone='$login') AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  echo "Login successful";
} else {
  
  echo "Invalid login credentials";
}

// Close the database connection
$conn->close();
?>

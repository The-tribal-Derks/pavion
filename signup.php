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
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];

// Query to check if email or phone number already exists
$checkQuery = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
  // Email or phone number already exists
  echo "Error: Email or phone number already exists";
} else {
  // Insert user data into the database
  $insertQuery = "INSERT INTO users (firstname, lastname, gender, phone, email, password) VALUES ('$firstname', '$lastname', '$gender', '$phone', '$email', '$password')";
  
  if ($conn->query($insertQuery) === TRUE) {
    // User registration successful
    echo "Registration successful";
    
    // Redirect to sign-in page after successful registration
    header("Location: up2.html");
    exit();
  } else {
    // Error occurred while inserting data
    echo "Error: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

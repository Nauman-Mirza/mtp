<?php
// Database connection parameters
$server = "localhost";
$username = "root";
$password = "";
$database = "mtp";

// Create a connection to the database
$conn = new mysqli($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to UTF-8
$conn->set_charset("utf8");
?>
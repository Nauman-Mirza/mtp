<?php
include '../session.php';
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the user ID from the URL
    $userId = $_GET["id"];

    // Perform the deletion
    $deleteQuery = "DELETE FROM users WHERE id = $userId";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: user_list.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

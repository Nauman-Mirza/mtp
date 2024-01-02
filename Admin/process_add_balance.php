<?php
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding balance

    // Get the user data from the form
    $userId = $_POST["id"];
    $currentBalance = $_POST["current_balance"];
    $addBalance = $_POST["add_balance"];

    // Calculate the new balance
    $newBalance = $currentBalance + $addBalance;

    // Update the user's balance in the database
    $updateBalanceQuery = "UPDATE users SET balance = $newBalance WHERE id = $userId";

    if ($conn->query($updateBalanceQuery) === TRUE) {
        header("Location: user_list.php");
    } else {
        echo "Error updating balance: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

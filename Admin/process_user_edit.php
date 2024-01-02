<?php
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating user data

    // Get the updated user data from the form
    $updatedFirstName = $_POST["firstname"];
    $updatedLastName = $_POST["lastname"];
    $updatedUsername = $_POST["username"];
    $updatedBranchId = $_POST["branch_id"];
    $updatedPhoneNumber = $_POST["phonenumber"]; // Add this line
    $userId = $_POST["id"];

    // Update the user data in the database
    $updateQuery = "UPDATE users
                    SET firstname = '$updatedFirstName',
                        lastname = '$updatedLastName',
                        username = '$updatedUsername',
                        branch_id = $updatedBranchId,
                        phonenumber = '$updatedPhoneNumber'
                    WHERE id = $userId";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: user_list.php");
    } else {
        echo "Error updating user data: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

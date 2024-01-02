<?php
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding a branch

    // Get the branch data from the form
    $name = $_POST["name"];
    $address = $_POST["address"];
    $status = $_POST["status"];

    // Insert the new branch into the database
    $insertBranchQuery = "INSERT INTO branch_list (name, address, status)
                          VALUES ('$name', '$address', $status)";

    if ($conn->query($insertBranchQuery) === TRUE) {
        header("Location: branch_list.php");
    } else {
        echo "Error adding branch: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

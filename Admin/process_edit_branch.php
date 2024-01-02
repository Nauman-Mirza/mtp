<?php
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating a branch

    // Get the updated branch data from the form
    $updatedName = $_POST["name"];
    $updatedAddress = $_POST["address"];
    $updatedStatus = $_POST["status"];
    $branchId = $_POST["id"];

    // Update the branch data in the database
    $updateBranchQuery = "UPDATE branch_list
                          SET name = '$updatedName',
                              address = '$updatedAddress',
                              status = $updatedStatus
                          WHERE id = $branchId";

    if ($conn->query($updateBranchQuery) === TRUE) {
        header("Location: branch_list.php");
    } else {
        echo "Error updating branch data: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

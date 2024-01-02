<?php
include '../session.php';
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the branch ID from the URL parameter
    $branchId = $_GET["id"];

    // Check if the branch exists in the database
    $checkBranchQuery = "SELECT * FROM branch_list WHERE id = $branchId";
    $result = $conn->query($checkBranchQuery);

    if ($result->num_rows > 0) {
        // Branch exists, proceed with deletion
        $deleteBranchQuery = "DELETE FROM branch_list WHERE id = $branchId";

        if ($conn->query($deleteBranchQuery) === TRUE) {
            header("Location: branch_list.php");
        } else {
            echo "Error deleting branch: " . $conn->error;
        }
    } else {
        // Branch does not exist
        echo "Branch not found!";
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

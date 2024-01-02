<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $rawPassword = $_POST["password"];
    $hashedPassword = md5($rawPassword); // Hash the password
    $branchName = $_POST["branch"];
    $mobile = $_POST["mobile"];

    // Fetch branch_id based on the selected branch name
    $selectBranchIdQuery = "SELECT id FROM branch_list WHERE name = '$branchName'";
    $result = $conn->query($selectBranchIdQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $branchId = $row["id"];

        // Insert user data into the database
        $insertQuery = "INSERT INTO users (firstname, lastname, username, password, type, branch_id, phonenumber) 
                        VALUES ('$firstname', '$lastname', '$username', '$hashedPassword', 2, '$branchId', '$mobile')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            header("Location: ../login.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Unable to fetch branch ID.";
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>
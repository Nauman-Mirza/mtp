<?php
// Include your database connection file
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding a user

    // Get the user data from the form
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $phonenumber = $_POST["phonenumber"];
    $type = $_POST["type"];
    $branch_id = $_POST["branch_id"];

    // Insert the new user into the database
    $insertUserQuery = "INSERT INTO users (firstname, lastname, username, password, phonenumber, type, branch_id)
                        VALUES ('$firstname', '$lastname', '$username', '$password', '$phonenumber', $type, $branch_id)";

    if ($conn->query($insertUserQuery) === TRUE) {
        header("Location: user_list.php");
    } else {
        echo "Error adding user: " . $conn->error;
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

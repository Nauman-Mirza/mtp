<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $selectUserQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($selectUserQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password == $row["password"]) {
            if ($row["type"] == 1) {
                echo "admin login successful";
                // header("Location: admin_dashboard.php");
                exit();
            } elseif ($row["type"] == 2) {
                echo "user login successful";
                // header("Location: user_dashboard.php");
                exit();
            } else {
                echo "Unknown user type!";
            }
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
} else {
    // Handle invalid requests
    echo "Invalid request!";
}

// Close the database connection
$conn->close();
?>

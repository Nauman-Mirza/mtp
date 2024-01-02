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
            // Start a session
            session_start();

            // Store user information in the session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_type"] = $row["type"];

            if ($row["type"] == 1) {
                // Admin user, redirect to admin dashboard
                header("Location: Admin/admin_dashboard.php");
                exit();
            } elseif ($row["type"] == 2) {
                // Regular user, redirect to user dashboard
                header("Location: User/user_dashboard.php");
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

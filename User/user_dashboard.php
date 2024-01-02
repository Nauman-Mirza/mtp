<?php

include '../session.php';

// Include your database connection file
include '../db_connection.php';

// If the logout button is clicked
if (isset($_POST["logout"])) {
    // Unset or destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to the login page
    header("Location: ../login.php");
    exit();
}

// Fetch user record based on the user ID from the session
$userID = $_SESSION["user_id"];
$selectUserQuery = "SELECT * FROM users WHERE id = $userID";
$result = $conn->query($selectUserQuery);

// Check if user record is found
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();

    // Display user information
    echo "<h1>Welcome, {$userData['username']}!</h1>";

    // If user type is 2 (staff), display the current balance
    if ($userData['type'] == 2) {
        echo "<p>Your current balance: {$userData['balance']}</p>";
    }

    // // Anchor tag for User List
    // echo '<a href="user_list.php"><button>User List</button></a>';

    // // Anchor tag for Branch List
    // echo '<a href="branch_list.php"><button>Branch List</button></a>';

    // Logout form
    echo '<form method="post">';
    echo '<button type="submit" name="logout">Logout</button>';
    echo '</form>';

    // You can add more content here for your admin dashboard
} else {
    // Handle user not found
    echo "User not found!";
}

// Close the database connection
$conn->close();
?>

<?php

include '../session.php';

// If the logout button is clicked
if (isset($_POST["logout"])) {
    // Unset or destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to the login page
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <?php echo "<h1>Welcome, $username!</h1>"; ?>

    <!-- Anchor tag for User List -->
    <a href="user_list.php"><button>User List</button></a>

    <!-- Anchor tag for Branch List -->
    <a href="branch_list.php"><button>Branch List</button></a>

    <!-- Logout form -->
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>

    <!-- You can add more content here for your admin dashboard -->

</body>
</html>

<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Balance</title>
</head>
<body>
    <h2>Add Balance</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';

    // Fetch user data based on the user ID
    $userId = $_GET["id"];
    $selectUserQuery = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($selectUserQuery);

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        // Handle user not found
        echo "User not found!";
        exit();
    }
    ?>

    <form action="process_add_balance.php" method="post">
        <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">

        <label for="current_balance">Current Balance:</label>
        <input type="text" name="current_balance" value="<?php echo $userData['balance']; ?>" readonly><br>

        <label for="add_balance">Add Balance:</label>
        <input type="text" name="add_balance" required><br>

        <input type="submit" value="Add Balance">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

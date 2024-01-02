<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Branch</title>
</head>
<body>
    <h2>Add Branch</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';
    ?>

    <form action="process_add_branch.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select><br>

        <input type="submit" value="Add Branch">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

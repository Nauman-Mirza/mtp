<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>Add User</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';

    // Fetch branch names from the branch_list table for the dropdown
    $selectBranchesQuery = "SELECT id, name FROM branch_list";
    $branchesResult = $conn->query($selectBranchesQuery);
    ?>

    <form action="process_add_user.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="phonenumber">Phone Number:</label>
        <input type="text" name="phonenumber" required><br>

        <label for="type">User Type:</label>
        <select name="type" required>
            <option value="1">Admin</option>
            <option value="2">Staff</option>
        </select><br>

        <label for="branch_id">Branch:</label>
        <select name="branch_id" required>
            <?php while ($branch = $branchesResult->fetch_assoc()): ?>
                <option value="<?php echo $branch['id']; ?>">
                    <?php echo $branch['name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <input type="submit" value="Add User">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

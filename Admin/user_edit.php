<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info</title>
</head>
<body>
    <h2>Edit User Info</h2>

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

    // Fetch branch names from the branch_list table for the dropdown
    $selectBranchesQuery = "SELECT id, name FROM branch_list";
    $branchesResult = $conn->query($selectBranchesQuery);
    ?>

    <form action="process_user_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">

        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo $userData['firstname']; ?>" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $userData['lastname']; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $userData['username']; ?>" required><br>

        <label for="branch_id">Branch:</label>
        <select name="branch_id" required>
            <?php while ($branch = $branchesResult->fetch_assoc()): ?>
                <option value="<?php echo $branch['id']; ?>" <?php echo ($userData['branch_id'] == $branch['id']) ? 'selected' : ''; ?>>
                    <?php echo $branch['name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <label for="phonenumber">Phone Number:</label>
        <input type="text" name="phonenumber" value="<?php echo $userData['phonenumber']; ?>" required><br>

        <input type="submit" value="Update">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

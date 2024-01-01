<?php
include '../db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>User Registration</h2>
    
    <form action="process_user_signup.php" method="post">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" required><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="mobile">Mobile Number:</label>
        <input type="text" name="mobile" required><br>
        
        <label for="branch">Branch:</label>
        <select name="branch" required>
            <?php
                // Fetch branch names from the database
                $selectQuery = "SELECT name FROM branch_list";
                $result = $conn->query($selectQuery);

                // Display branch names in the dropdown
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
            ?>
        </select><br>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
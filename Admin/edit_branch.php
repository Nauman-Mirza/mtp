<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Branch</title>
</head>
<body>
    <h2>Edit Branch</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';

    // Fetch branch data based on the branch ID
    $branchId = $_GET["id"];
    $selectBranchQuery = "SELECT * FROM branch_list WHERE id = $branchId";
    $result = $conn->query($selectBranchQuery);

    if ($result->num_rows > 0) {
        $branchData = $result->fetch_assoc();
    } else {
        // Handle branch not found
        echo "Branch not found!";
        exit();
    }
    ?>

    <form action="process_edit_branch.php" method="post">
        <input type="hidden" name="id" value="<?php echo $branchData['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $branchData['name']; ?>" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $branchData['address']; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="1" <?php echo ($branchData['status'] == 1) ? 'selected' : ''; ?>>Active</option>
            <option value="0" <?php echo ($branchData['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
        </select><br>

        <input type="submit" value="Update Branch">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

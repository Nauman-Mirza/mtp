<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Branch List</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';

    // Fetch branch data from the branch_list table
    $selectBranchesQuery = "SELECT * FROM branch_list";
    $result = $conn->query($selectBranchesQuery);
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo ($row['status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                        <td class="action-buttons">
                            <a href="edit_branch.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a>
                            <a href="delete_branch.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No branch data found.</p>
    <?php endif; ?>

    <div class="action-buttons">
        <a href="add_branch.php"><button>Add Branch</button></a>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

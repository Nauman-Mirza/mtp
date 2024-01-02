<?php
include '../session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
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

        .action-buttons {
            margin-top: 20px;
        }

        .action-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>User Data Table</h2>

    <?php
    // Include your database connection file
    include '../db_connection.php';

    // Fetch user data from the database with branch names
    $selectQuery = "SELECT users.*, branch_list.name AS branch_name FROM users
                    LEFT JOIN branch_list ON users.branch_id = branch_list.id
                    WHERE users.type = 2";
    $result = $conn->query($selectQuery);
    ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Balance</th>
                    <th>Branch Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['phonenumber']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                        <td><?php echo $row['branch_name']; ?></td>
                        <td>
                            <a href="user_edit.php?id=<?php echo $row['id']; ?>"><button>Edit Info</button></a>
                            <a href="add_balance.php?id=<?php echo $row['id']; ?>"><button>Add Balance</button></a>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>"><button>Delete User</button></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No user data found.</p>
    <?php endif; ?>

    <div class="action-buttons">
        <a href="add_user.php"><button>Add User</button></a>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

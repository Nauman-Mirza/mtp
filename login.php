<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>User Login</h2>
    
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="User/user_signup.php">Sign Up</a></p>
</body>
</html>
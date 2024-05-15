<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register_process.php" method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Interface:</label>
            <input type="text" name="interface" required>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</body>
</html>

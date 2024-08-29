<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to User Management System</h1>

        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</p>
            <a href="dashboard.php">Go to Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <p>Please <a href="login.php">Login</a> or <a href="register.php">Register</a> to continue.</p>
        <?php endif; ?>
    </div>
</body>
</html>

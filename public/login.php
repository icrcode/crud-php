<?php

include '../includes/db_connect.php';
include '../src/User.php';
include '../src/Auth.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User($conn);
    $auth = new Auth();

    $loggedInUser = $user->login($_POST['email'], $_POST['password']);
    if ($loggedInUser) {
        $auth->loginUser($loggedInUser);
        header("Location: dashboard.php");
    } else {
        echo "Login failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>

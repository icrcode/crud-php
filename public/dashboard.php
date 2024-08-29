<?php

include '../src/Auth.php';
include '../includes/db_connect.php';
include '../src/User.php';

session_start();
$auth = new Auth();
$user = new User($conn);

if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$currentUser = $user->getUserById($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <br><br>
        <img src="../uploads/<?php echo htmlspecialchars($currentUser['profile_pic']); ?>" 
        alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
        <div>
            <br>
            <a href="upload_photo.php">Upload New Profile Picture</a>
            <br>
            <a href="logout.php">Logout</a>
            <br>
            <a href="index.php">Home</a>
        </div>
    </div>
</body>
</html>

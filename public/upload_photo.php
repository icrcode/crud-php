<?php

include '../includes/db_connect.php';
include '../src/User.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User($conn);
$currentUser = $user->getUserById($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verifica se o arquivo é uma imagem real
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo
    if ($_FILES["profile_pic"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Permite certos formatos de arquivos
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Verifica se ocorreu algum erro
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            $user->updateProfilePic($_SESSION['user_id'], basename($_FILES["profile_pic"]["name"]));
            header("Location: dashboard.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Upload Profile Picture</title>
</head>
<body>
    <form action="upload_photo.php" method="post" enctype="multipart/form-data">
        <h2>Upload Profile Picture</h2>
        <input type="file" name="profile_pic" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

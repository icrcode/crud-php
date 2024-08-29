<?php

class User {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hash);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function updateProfilePic($userId, $profilePic) {
        $sql = "UPDATE users SET profile_pic = :profile_pic WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':profile_pic', $profilePic);
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }

    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

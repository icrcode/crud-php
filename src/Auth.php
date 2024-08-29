<?php

class Auth {
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function loginUser($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
?>

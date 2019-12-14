<?php

class LogoutModel{
    public function logout() {
        session_start();
        unset($_SESSION['email']);
        session_destroy();
        header("location: ../index.php");
        exit();
    }
}

?>
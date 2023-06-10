<?php
    require_once "../services/db.php";

    function getUserByUsername($username) {
        $conn = connectDatabase();
        $getUserSqlQuery = "select * from users where username = '$username'";

        return mysqli_query($conn, $getUserSqlQuery)->fetch_assoc();
    }

    function getCurrentUser() {
        return getUserByUsername($_COOKIE['username']);
    }
?>
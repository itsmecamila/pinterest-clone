<?php

require '../services/db.php';

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $conn = connectDatabase();

        $imgData = base64_encode(file_get_contents(addslashes($_FILES['file']['tmp_name'])));
        $username = $_COOKIE['username'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "insert into posts (user, title, description, image) values ('$username', '$title', '$description', '$imgData')";

        mysqli_query($conn, $sql);

        header('Location:../views/home.php');
    }
}
<?php

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $conn = mysqli_connect("localhost", "root", "", "pinterest");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql =  "insert into users (username, name, email, password, birthday) values ('cams1', 'Camila', '$email', '$password', '12/12/12')";
    mysqli_query($conn, $sql);

    header("Location:../views/home.php");
}

?>
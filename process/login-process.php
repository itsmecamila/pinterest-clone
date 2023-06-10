<?php
require '../services/db.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $conn = connectDatabase();

    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = mysqli_query($conn,"select * from users where email = '$email' and password = '$password'")->fetch_assoc();
    
    if(isset($user)){
        setcookie('username',$user['username'],time() + (86400 * 30),"/"); 
        header("Location:../views/home.php");
        die();
    }

}

header("Location:./views/login.php");
die();
?>
<?php
session_start();

require '../services/db.php';

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $conn = connectDatabase();

    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];

    $search = "select * from users where username = '$username'";
    $result = mysqli_query($conn,$search);

    if($result->num_rows >= 1){
        $_SESSION['RegisterError'] = "Nome de usuário já existente. Tente outro.";
        header("Location:../views/register.php");
        die();
    }

    
    $sql =  "insert into users (username, name, email, password, birthday) values ('$username', '$name', '$email', '$password', '$birthday')";
    
    try{
        mysqli_query($conn, $sql);
        header("Location:../views/home.php");
    }

    catch(Exception $e){
        echo "Ocorreu algum erro. Tente novamente com outro email ou username.";
    }

}

?>
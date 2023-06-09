<?php


if(isset($_POST["email"]) && isset($_POST["password"])){

    $conn = mysqli_connect("localhost", "root", "", "pinterest");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = mysqli_query($conn,"select * from users where email = '$email' and password = '$password'")->fetch_assoc();
    
    if(isset($user)){
        setcookie('username',$user['username']); 
        header("Location:../views/home.php");
        die();
    }

    header("Location:./views/login.php");
}


    //$search = "select * from users where email = $email and password = $password";
    //$result = mysqli_query($conn,$search); 

    //if(mysqli_num_rows($result) > 0){
      //  $_COOKIE['user'] = $result->fetch_assoc()["username"];
        //header("Location:../views/home.php"); 
        //die();
    //}

    header("Location:../views/login.php");
    die();
//}
?>
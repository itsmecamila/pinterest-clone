<?php
    require("../services/db.php");
    $conn = connectDatabase();

    if(isset($_POST['name'])){
        $folder_name = $_POST['name'];
        $user_id = $_COOKIE['username'];

        $sql = "insert into folders(user_id,name) values ('$user_id','$folder_name')";
        
        mysqli_query($conn,$sql);

        $search = "select * from folders where user_id = '$user_id' and name = '$folder_name'";

        $folder = mysqli_query($conn,$search)->fetch_assoc();

        header("Location:../views/folder.php?id=". $folder['id']);

    }
?>
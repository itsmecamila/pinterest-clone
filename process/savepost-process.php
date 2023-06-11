<?php

require "../services/db.php";
$conn = connectDatabase();

if(isset($_GET['post_id']) && isset($_GET['folder_id'])){

    $post_id = $_GET['post_id'];
    $folder_id = $_GET['folder_id'];


    $sql = "insert into folder_has_post values ('$folder_id','$post_id')";

    mysqli_query($conn,$sql);
    header("Location:../views/folder.php?id=$folder_id");
}







?>
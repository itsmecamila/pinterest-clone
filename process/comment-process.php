<?php
require("../services/db.php");
$conn = connectDatabase();

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $post_id = $_GET['id'];
    $user = $_COOKIE['username'];

    mysqli_query($conn,"insert into comments (post_id,user_id,comment) values ('$post_id','$user','$comment')");
    header("Location:../views/post.php?id=".$post_id);
    die();
}













?>
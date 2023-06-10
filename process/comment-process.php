<?php
require("../daos/comment.php");

$post_id = $_GET['id'];

if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $user = $_COOKIE['username'];

    createComment($post_id, $user, $comment);
}

header("Location:../views/post.php?id=".$post_id);
die();













?>
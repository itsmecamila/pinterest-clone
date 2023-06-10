<?php
    require "../daos/user.php";
    require "../daos/post.php";

    $loggedUser = getCurrentUser();

    $postId = $_GET['id'];
    $post = getPostById($postId);

    if ($post['user'] != $loggedUser['username']) {
        header('Location:../views/profile.php');
        die();
    }

    deletePostById($postId);

    header('Location:../views/profile.php');
    die();
?>
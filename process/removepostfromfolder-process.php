<?php
    require "../daos/folder.php";

    if (isset($_GET['post_id']) and isset($_GET['folder_id'])) {

        $postId = $_GET['post_id'];
        $folderId = $_GET['folder_id'];

        deletePostFromFolder($folderId,$postId);

        header('Location:../views/folder.php?id='.$folderId);
        die();
    }

    header('Location:../views/home.php');
    die();
?>
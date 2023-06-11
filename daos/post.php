<?php
    require_once "../services/db.php";

    function getAllPosts() {
        $conn = connectDatabase();
        $getAllPostsSqlQuery = "select * from posts";

        return mysqli_query($conn,$getAllPostsSqlQuery);
    }

    function getPostById($postId) {
        $conn = connectDatabase();
        $getPostByIdSqlQuery = "select * from posts where id = '$postId'";

        return mysqli_query($conn,$getPostByIdSqlQuery)->fetch_assoc();
    }

    function getAllPostsFromUser($userId) {
        $conn = connectDatabase();
        $getPostByIdSqlQuery = "select * from posts where user = '$userId'";

        return mysqli_query($conn,$getPostByIdSqlQuery);
    }

    function deletePostById($postId) {
        $conn = connectDatabase();
        $deletePostByIdSqlQuery = "delete from posts where id = '$postId'";
        $deletePostFromFolderSqlQuery = "delete from folder_has_post where post_id = '$postId'";

        mysqli_query($conn,$deletePostByIdSqlQuery); 
        mysqli_query($conn,$deletePostFromFolderSqlQuery); 
    }
?>
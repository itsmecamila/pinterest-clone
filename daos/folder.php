<?php
    require_once "../services/db.php";

    function getAllFoldersFromUser($userId) {
        $conn = connectDatabase();
        $getAllFoldersFromUserSqlQuery = "select * from folders where user_id = '$userId'";

        return mysqli_query($conn,$getAllFoldersFromUserSqlQuery);
    }

    function getAllPostsFromFolder($folderId) {
        $conn = connectDatabase();
        $getAllPostsFromFolderSqlQuery = "select * from folder_has_post where folder_id = '$folderId'";

        return mysqli_query($conn,$getAllPostsFromFolderSqlQuery);
    }

    function getFolderById($folderId) {
        $conn = connectDatabase();
        $getFolderFromUserSqlQuery = "select * from folders where id = '$folderId'";

        return mysqli_query($conn,$getFolderFromUserSqlQuery)->fetch_assoc(); 
    }

    function deletePostFromFolder($folderId,$postId) {
        $conn = connectDatabase();

        $deletPostFromFolderSqlQuery = "delete from folder_has_post where folder_id = '$folderId' and post_id = '$postId'";

        return mysqli_query($conn,$deletPostFromFolderSqlQuery); 
    }
?>
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
?>
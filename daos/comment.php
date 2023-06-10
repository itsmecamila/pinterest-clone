<?php
    require_once "../services/db.php";

    function getCommentsFromPost($post_id) {
        $conn = connectDatabase();
        $getCommentsFromPostSqlQuery = "select * from comments where post_id ='$post_id'";

        return mysqli_query($conn, $getCommentsFromPostSqlQuery);
    }
?>
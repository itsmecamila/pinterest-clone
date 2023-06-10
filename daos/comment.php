<?php
    require_once "../services/db.php";

    function createComment($postId, $userId, $comment) {
        $conn = connectDatabase();
        $createCommentSqlQuery = "insert into comments (post_id,user_id,comment) values ('$postId','$userId','$comment')";

        mysqli_query($conn,$createCommentSqlQuery);
    }

    function getCommentsFromPost($post_id) {
        $conn = connectDatabase();
        $getCommentsFromPostSqlQuery = "select * from comments where post_id ='$post_id'";

        return mysqli_query($conn, $getCommentsFromPostSqlQuery);
    }
?>
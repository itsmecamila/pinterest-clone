<?php
    require("../services/db.php");
    $conn = connectDatabase();

    echo "papl";

    if(isset($_POST['name'])){
        $folder_name = $_POST['name'];
        $user_id = $_COOKIE['username'];

        echo "$folder_name";
        echo "$user_id";

        $sql = "insert into folders(user_id,name) values ('$user_id','$folder_name')";
        
        $result = mysqli_query($conn,$sql)->fetch_assoc();
        header("Location:../views/folder.php?id=".);
    }
?>
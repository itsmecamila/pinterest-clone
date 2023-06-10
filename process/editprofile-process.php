<?php
    require "../daos/user.php";

    $loggedUser = getCurrentUser();
    $avatarData = $loggedUser['photo'];

    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            $avatarData = base64_encode(file_get_contents(addslashes($_FILES['avatar']['tmp_name'])));
        }
    }

    $name = $_POST['name'];
    $username = $loggedUser['username'];

    updateUser($username, $name, $avatarData);

    header('Location:../views/profile.php');
    die();
?>
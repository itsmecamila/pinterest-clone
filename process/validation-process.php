<?php
    function onlyAuthenticatedUser(){
        if(!isset($_COOKIE['username'])){
            header("Location:../views/login.php");
            die();
        }
    }

    function onlyUnauthenticatedUser() {
        if(isset($_COOKIE['username'])){
            header("Location:../views/home.php");
            die();
        }
    }
?>

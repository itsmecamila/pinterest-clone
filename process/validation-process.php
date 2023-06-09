<?php
    function validarLogin(){
        if(!isset($_COOKIE['username'])){
            header("Location:../views/login.php");
            die();
        }
    }
?>

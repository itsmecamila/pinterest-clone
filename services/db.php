<?php
    function connectDatabase() {
        return mysqli_connect("localhost", "root", "", "pinterest");
    }
?>
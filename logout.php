<?php
    session_start();
    if(session_destroy()) {
        setcookie("username", "",time() - 3600, "/","", 0);
        setcookie("user_id", "", time() - 3600, "/","", 0);
        setcookie("type", "", time() - 3600, "/","", 0);
        header("Location: index.php");
    }
?>
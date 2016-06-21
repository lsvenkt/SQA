<?php
    session_start();
    $_SESSION["pcno"]="";
    $_SESSION["name"]="";
    session_destroy();
    header("Location: login.php");   
?>

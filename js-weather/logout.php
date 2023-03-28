<?php
    session_start();
    // Destroy session
    unset($_SESSION["email"]);
    
        // Redirecting To Home Page
        header("Location: login.php");
    
?>
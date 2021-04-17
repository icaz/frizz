<?php
// remove all session variables
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();

// destroy the session
session_destroy();
    echo 'Session was destroyed';
    header("Location: ./session.php");

?>
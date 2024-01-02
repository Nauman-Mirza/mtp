<?php
// session.php

// Start the session
session_start();

// Check if the user is logged in (session is set)
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
}
?>
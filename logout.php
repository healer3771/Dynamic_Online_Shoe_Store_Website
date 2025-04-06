<!-- Name: Qadeer Ahmad
Date: 11/17/2023
Course Name: Internet Application
Section: 001
Assingment: Section 001 Unit 9 Assignment
Email: qa9@njit.edu
Login information for page is
Email: john@example.com
passw: s3sam3
-->
<?php
    session_start();

    //clear all session data
    // Check if the session variable is set

    $_SESSION = [];
    session_destroy();
    $login_message = 'You have been logged out';
    include('login.php');
?>
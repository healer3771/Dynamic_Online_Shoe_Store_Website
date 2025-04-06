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
    require_once('manager_db.php');

    $email = filter_input(INPUT_POST,'email');
    $password = filter_input(INPUT_POST,'password');

    if(is_valid_manager_login($email, $password)) {
        //$_SESSION['is_valid_admin'] == true;
        echo "<p>You have succesfully logged in.</p>";
        include("home.php");
    } else {
        if($email == null && $password == null) {
            $login_message = 'You must login to view Main Page.';
        } else {
            $login_message = 'Invalid Credentials';
        }
        include('login.php');
    }
?>
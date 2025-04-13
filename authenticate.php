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
    require_once('database.php');

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if(is_valid_manager_login($email, $password)) {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Set session flag
        $_SESSION['is_valid_admin'] = true;
        
        // Get user data and store in session
        $db = getDB();
        $query = 'SELECT firstName, lastName, emailAddress FROM shoeManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $_SESSION['tableData'] = array(
                'firstName' => $user['firstName'],
                'lastName' => $user['lastName'],
                'emailAddress' => $user['emailAddress']
            );
        }
        
        header("Location: home.php");
        exit();
    } else {
        if($email == null && $password == null) {
            $login_message = 'You must login to view Main Page.';
        } else {
            $login_message = 'Invalid Credentials';
        }
        include('login.php');
    }
?>
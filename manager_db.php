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
    require_once('database.php');

    session_start();
    function is_valid_manager_login($email, $password) {
        require_once('database.php');
        $db = getDB();
        $qurey = 'SELECT password FROM shoeManagers WHERE emailAddress = :email';
        $statement = $db->prepare($qurey);
        $statement->bindValue(':email', $email);
       // $statement->bindValue(':password', $password);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();

        if($result === false) {
            return false;
        } else{
            //getting the saved password to compare with user written
            $hash = $result['password'];
            //comparing the two password and return true or false
            return password_verify($password, $hash);
        }
    }

    $email = filter_input(INPUT_POST,'email');
    $db = getDB();
        $qurey = 'SELECT firstName, lastName FROM shoeManagers WHERE emailAddress = :email';
        $statement = $db->prepare($qurey);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        $firstName =  $result['firstName'];
        $lastName =  $result['lastName'];
?>
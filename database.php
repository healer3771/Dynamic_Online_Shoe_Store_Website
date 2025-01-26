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
//slide 24
function getDB(){
    $local_dsn = 'mysql:host=localhost;port=3306;dbname=my_guitar_shop1';
    $local_username = 'msg_user';
    $local_password = 'pa55word';

    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=qa9';
    $njit_username = 'qa9';
    $njit_password = 'Pakistan1200!';

    //TODO create variable for NJIT server

    $dsn = $local_dsn;
    $username = $local_username;
    $password = $local_password;
    

    try{
        $db = new PDO($njit_dsn, $njit_username, $njit_password);

        //echo '<p>You are connected to the database!</p>';
    }
    catch(PDOException $exception){
        $error_message = $exception->getMessage();
        include("database_error.php");
        exit();
    }
    return $db;
}
?>
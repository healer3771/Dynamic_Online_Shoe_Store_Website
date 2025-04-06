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
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
}
$email = "";
if(isset($_SESSION['tableData'])) {
    // Access the stored data
    $tableData = $_SESSION['tableData'];
    $email = $tableData['emailAddress'];
    
}else {
    echo "No data available.";
}
$db = getDB();
$query = 'SELECT firstName, lastName, emailAddress FROM shoeManagers WHERE emailAddress = :email';

try {
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    
    // Check if any rows were returned
    $user_data = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user_data) {
        // If rows were returned, start the session and store the data
        $_SESSION['tableData'] = $user_data;
    } else {
        echo "error";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

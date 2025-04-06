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
    $db = getDB();

    $shoeID = filter_input(INPUT_POST, 'shoeID', FILTER_VALIDATE_INT);
    $shoeCategoryID = filter_input(INPUT_POST, 'shoeCategoryID', FILTER_VALIDATE_INT);
    
    //Delete the Product from the database
    if($shoeID != false && $shoeCategoryID != false) {
        $query = 'DELETE FROM shoes WHERE shoeID = :shoeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':shoeID', $shoeID);
        $success= $statement->execute();
        $statement->closeCursor();

        echo "<p>Your deleted statement status is $success.</p>";
        //display the shoes list page
        include("shoes.php");
    }
?>
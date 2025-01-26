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
// Require the database config
require_once('database.php');
    $db = getDB();
// Insert shoe 
function insertShoe($params) {

  global $db; // Use the shared connection

  // Insert query
  $sql = "INSERT INTO shoes (shoeCategoryID, shoeCode, shoeName, description, price, dateAdded)
          VALUES (?, ?, ?, ?, ?, NOW())";

  $stmt = $db->prepare($sql);
  $stmt->execute($params);



  header('Location: shoes.php');

}

// Validate code
function validateCode($code) {
  
  global $db; // Reuse existing connection

  // Query code
  $sql = "SELECT * FROM shoes WHERE shoeCode = :code";

  $stmt = $db->prepare($sql);
  $stmt->bindValue(":code", $code);
  $stmt->execute();
  $mainCode = $stmt->fetch();
  $stmt->closeCursor();

  // Return true if unique
  if($stmt->rowCount() == 0) {
    return true;

  } else {
    return false;
  }

}
function checkFloat($price){

    if(!is_numeric($price) || $price < 0 || $price > 150) {
        echo '<span class="styled-text" style="font-size: 25px">Given price is wrong (should be float value like 99.45) or value must be in limited range</span>';
        return false;
    }
    else{
    return true; }
  
  }

// Get categories
function getCategories(){
    global $db;

  // Query categories
  $sql = "SELECT * FROM shoeCategories";    
  $result = $db->query($sql);

  return $result->fetchAll(PDO::FETCH_ASSOC);

}

?>
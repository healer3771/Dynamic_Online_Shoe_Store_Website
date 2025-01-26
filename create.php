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
include("add_shoe.php");
require_once("store.php");
// Get shoe categories
$categories = getCategories(); 

// Define error variable
$error = '';

// Form submit
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $category = $_POST['category'];
  $code = $_POST['code'];
  $name = $_POST['name'];
  $desc = $_POST['description'];
  $price = (float) $_POST['price'];

  // Validate code is unique
  if(!validateCode($code)) {
    $error = 'Shoe code already exists'; 
    //echo($error);
    echo '<span class="styled-text" style="font-size: 25px">Shoe code already exists</span>';
    
  } 
  $MAX_PRICE = 150;

  // Validate price
   checkFloat($price);

  // Insert if no errors
  if(empty($error)) {
    echo('empty error');
    $params = [
      $category, $code, $name, $desc, $price
    ];
    insertShoe($params);
  }

}

// HTML form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
    <!-- Include any additional CSS specific to this page if needed -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="shipping.php">Shipping</a></li>
                <li><a href="ourstory.php">OurStory</a></li>
                <li><a href="shoes.php">Shoes</a></li>
                <li><a href="create.php">Create</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
        <?php
           // session_start();
          // Check if the session variable is set
        if(isset($_SESSION['tableData'])) {
            // Access the stored data
            $tableData = $_SESSION['tableData'];

            // Use the data as needed
            $firstName = $tableData['firstName'];
            $lastName = $tableData['lastName'];
            $email = $tableData['emailAddress'];
            echo "Welcome $firstName $lastName ($email)";
            
        } else {
            echo "No data available.";
        }
        ?>
    </header>
    <main>
        <div>
        <h2>Add Shoe</h2>
        
        <form action="create.php" method="post" id="shoeForm">

        <select name="category">
        <?php foreach ($categories as $category): ?>
            <option value="<?=$category['shoeCategoryID']?>">
            <?=$category['shoeCategoryName']?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>Shoe Code</label>
        <input type="text" id="code" name="code" placeholder="Min:4 Max:10" maxlength="10" minlength="4"  required>
        <br>
        <label>Shoe Name</label>
        <input type="text" id="name" name="name" placeholder="Min:10 Max:100" minlength="10" maxlength="100" required>
        <br>
        <label>Shoe Discription</label>
        <textarea name="description" id="description" placeholder="Min:10 Max:255" minlength="10" maxlength="255" required></textarea>
        <br>
        <label>Shoe Price</label>
        <input type="number" name="price" id="price" placeholder="Max Price:1000,000" required max = "1000000" required min = 1>
        <br>
        <button type="button" id="resetBtn">Reset</button>
        <input type="submit" value="Add" id="getClick" >
        </form>
        <span id="display"></span>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
  <script src="confirm.js"></script>
</body>
</html>
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
    echo '<span class="styled-text" style="font-size: 25px">Shoe code already exists</span>';
  } 
  $MAX_PRICE = 150;

  // Validate price 
  checkFloat($price);

  // Insert if no errors
  if(empty($error)) {
    $params = [$category, $code, $name, $desc, $price];
    insertShoe($params);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Shoe - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the unified stylesheet -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="create-page">
  <!-- Header -->
  <header class="modern-header">
    <div class="header-content">
      <div class="logo">
        <a href="home.php">
          <img src="images/Solocityshoe.png" alt="SoleCityShoes Logo">
        </a>
      </div>
      <nav class="nav-links">
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="shipping.php"><i class="fas fa-truck"></i> Shipping</a>
        <a href="ourstory.php"><i class="fas fa-book"></i> Our Story</a>
        <a href="shoes.php"><i class="fas fa-shoe-prints"></i> Shoes</a>
        <a href="create.php"><i class="fas fa-plus-circle"></i> Create</a>
        <a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </nav>
    </div>
  </header>
  
  <!-- Welcome Banner -->
  <?php if(isset($_SESSION['tableData'])): ?>
  <div class="welcome-banner">
    <span>
      <i class="fas fa-user-circle"></i>
      Welcome <?php echo htmlspecialchars($_SESSION['tableData']['firstName'] . ' ' . $_SESSION['tableData']['lastName']); ?>
      (<?php echo htmlspecialchars($_SESSION['tableData']['emailAddress']); ?>)
    </span>
  </div>
  <?php endif; ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="create-container">
      <h2>Add Shoe</h2>
      <!-- Display error if any -->
      <?php if(!empty($error)): ?>
        <div class="error-message">
          <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>
      <form action="create.php" method="post" id="shoeForm">
        <label for="category">Category:</label>
        <select name="category" id="category">
          <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['shoeCategoryID']); ?>">
              <?= htmlspecialchars($category['shoeCategoryName']); ?>
            </option>
          <?php endforeach; ?>
        </select>
        
        <label for="code">Shoe Code</label>
        <input type="text" id="code" name="code" placeholder="Min:4 Max:10" maxlength="10" minlength="4" required>
        
        <label for="name">Shoe Name</label>
        <input type="text" id="name" name="name" placeholder="Min:10 Max:100" minlength="10" maxlength="100" required>
        
        <label for="description">Shoe Description</label>
        <textarea name="description" id="description" placeholder="Min:10 Max:255" minlength="10" maxlength="255" required></textarea>
        
        <label for="price">Shoe Price</label>
        <input type="number" name="price" id="price" placeholder="Max Price:1,000,000" required min="1" max="1000000">
        
        <button type="button" id="resetBtn">Reset</button>
        <input type="submit" value="Add" id="getClick">
      </form>
      <span id="display"></span>
    </div>
  </main>

  <!-- Footer -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>
  
  <script src="confirm.js"></script>
</body>
</html>

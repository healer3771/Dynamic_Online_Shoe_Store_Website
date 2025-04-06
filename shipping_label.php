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
<?php require_once("store.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shipping Label - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the same main stylesheet -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="shipping-label-page">
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

  <!-- Welcome Banner (if user data is available) -->
  <?php if(isset($_SESSION['tableData'])): ?>
  <div class="welcome-banner">
    <span>
      <i class="fas fa-user-circle"></i>
      Welcome 
      <?php echo htmlspecialchars($_SESSION['tableData']['firstName'] . ' ' . $_SESSION['tableData']['lastName']); ?>
      (<?php echo htmlspecialchars($_SESSION['tableData']['emailAddress']); ?>)
    </span>
  </div>
  <?php endif; ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="label-wrapper">
      <!-- Shipping Label Card -->
      <div class="shipping-label-card">
        <h2>Shipping Label</h2>
        
        <p><strong>From Address</strong><br>
          <?php echo nl2br(htmlspecialchars($_GET['fromAddress'] ?? '')); ?>
        </p>
        
        <p><strong>To Address</strong><br>
          <?php echo htmlspecialchars($_GET['toFirstName'] ?? '') . ' ' . htmlspecialchars($_GET['toLastName'] ?? ''); ?><br>
          <?php echo htmlspecialchars($_GET['toAddress'] ?? ''); ?><br>
          <?php 
            echo htmlspecialchars($_GET['toCity'] ?? '') . ', ' 
               . htmlspecialchars($_GET['toState'] ?? '') . ' ' 
               . htmlspecialchars($_GET['toZip'] ?? ''); 
          ?>
        </p>
        
        <p><strong>Package Details</strong><br>
          Dimensions: 
          <?php 
            echo htmlspecialchars($_GET['packageLength'] ?? '') . 'x' 
               . htmlspecialchars($_GET['packageWidth'] ?? '') . 'x' 
               . htmlspecialchars($_GET['packageHeight'] ?? '') . ' inches'; 
          ?>
          <br>
          Declared Value: $<?php echo htmlspecialchars($_GET['packageValue'] ?? ''); ?>
        </p>
        
        <p><strong>Shipping Information</strong><br>
          Shipping Company: <?php echo htmlspecialchars($_GET['shippingCompany'] ?? ''); ?><br>
          Shipping Class: <?php echo htmlspecialchars($_GET['shippingClass'] ?? ''); ?><br>
          Ship Date: <?php echo htmlspecialchars($_GET['shipDate'] ?? ''); ?><br>
          Tracking Number: <?php echo htmlspecialchars($_GET['trackingNumber'] ?? 'N/A'); ?>
        </p>
      </div>

      <!-- Barcode Image -->
      <div class="barcode-image">
        <!-- You can replace this with your own barcode image or generation logic -->
        <img src="images/shipping label.jpg" alt="Tracking Barcode" />
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>
</body>
</html>

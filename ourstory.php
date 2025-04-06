<?php require_once("store.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Story - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the same stylesheet as home.php for unified styling -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="ourstory-page">
  <!-- Header: Consistent full-width header -->
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

  <!-- Welcome Banner: Matches the home.php welcome banner -->
  <?php if(isset($_SESSION['tableData'])): ?>
    <div class="welcome-banner">
      <span>
        <i class="fas fa-user-circle"></i>
        Welcome <?php echo htmlspecialchars($_SESSION['tableData']['firstName'] . ' ' . $_SESSION['tableData']['lastName']); ?>
        (<?php echo htmlspecialchars($_SESSION['tableData']['emailAddress']); ?>)
      </span>
    </div>
  <?php endif; ?>

  <!-- Main Content Container -->
  <div class="outstory">
        <h1>Our Story</h1>
        <p>Our journey to SoleCity Shoes began with a passion for footwear and a vision to create a destination where people could find the perfect pair of shoes to express their unique style. We embarked on a mission to curate a diverse collection of high-quality shoes for men, women, and children, ranging from stylish sneakers to elegant heels and everything in between.</p>
        <p>With dedication and hard work, we scoured the fashion world to bring you the latest trends and timeless classics. Our commitment to exceptional customer service, transparent business practices, and a love for shoes has been the driving force behind our store's success.</p>
        <p>At SoleCity Shoes, we invite you to join us on this exciting journey, where fashion meets comfort, and where every step you take is a statement of your individuality. We're thrilled to be a part of your shoe-shopping experience and look forward to helping you find the perfect pair of shoes for every occasion.</p>
  </div>

  <!-- Footer: Full-width footer pinned to the bottom -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>
</body>
</html>

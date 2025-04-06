<?php 
if(!isset($login_message)){
    $login_message = "You must login to view the Main Page";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the same stylesheet as home.php -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons (same as home.php) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="login-page">
  <!-- Header: Same as home.php -->
  <header class="modern-header">
    <div class="header-content">
      <div class="logo">
        <a href="home1.php">
          <img src="images/Solocityshoe.png" alt="SoleCityShoes Logo">
        </a>
      </div>
      <nav class="nav-links">
        <a href="home1.php"><i class="fas fa-home"></i> Home</a>
        <a href="ourstory1.php"><i class="fas fa-book"></i> Our Story</a>
        <a href="shoes1.php"><i class="fas fa-shoe-prints"></i> Shoes</a>
      </nav>
    </div>
  </header>

  <!-- Main content -->
  <main class="main-content">
    <section class="login-form-section">
      <h2>Welcome Back</h2>
      <form action="authenticate.php" method="post" class="login-form">
        <label for="email">Email:</label>
        <input 
          type="text" 
          id="email" 
          name="email" 
          placeholder="Enter Email" 
          required 
          autofocus 
        />
        
        <label for="password">Password:</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Enter Password" 
          required 
        />
        
        <input type="submit" value="Login">
      </form>
      <p class="login-message"><?php echo $login_message; ?></p>
    </section>
  </main>

  <!-- Footer: Same as home.php -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>
</body>
</html>

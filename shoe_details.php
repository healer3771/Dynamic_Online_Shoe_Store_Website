<?php
include('database.php');
$db = getDB();
// Get shoe ID from query parameter
$shoeID = $_GET['id'];

// Validate shoeID
if (!is_numeric($shoeID)) {
  echo "Invalid shoe ID";
  exit;
}

// Create image path based on shoe ID
$image_path = "images/{$shoeID}.jpg";

// Query shoe details
$sql = "SELECT * FROM shoes WHERE shoeID = :shoeID"; 
$stmt = $db->prepare($sql);
$stmt->bindValue(':shoeID', $shoeID);
$stmt->execute();
$shoe = $stmt->fetch();

// Check if shoe was found
if (!$shoe) {
  echo "Shoe not found!";
  exit;
}

// Query all shoe categories (if needed for additional context)
$query = "SELECT * FROM shoeCategories";
$statement1 = $db->query($query);
$categories = $statement1->fetchAll();
?>
<?php require_once("store.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoe Details - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the unified stylesheet -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="shoe-details-page">
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
    <div class="details-container">
      <h2>Shoe Details for <?php echo htmlspecialchars($shoe['shoeName']); ?></h2>
      <div class="shoe-info">
        <div class="shoe-image-container">
          <img src="<?php echo htmlspecialchars($image_path); ?>" alt="Shoe Image" id="shoe_image">
        </div>
        <div class="shoe-data">
          <table id="shoes-table">
            <tr>
              <th>ID</th>
              <th>Category ID</th>
              <th>Code</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
            </tr>
            <tr>
              <td><?php echo htmlspecialchars($shoe['shoeID']); ?></td>
              <td><?php echo htmlspecialchars($shoe['shoeCategoryID']); ?></td>
              <td><?php echo htmlspecialchars($shoe['shoeCode']); ?></td>
              <td><?php echo htmlspecialchars($shoe['shoeName']); ?></td>
              <td><?php echo htmlspecialchars($shoe['description']); ?></td>
              <td><?php echo htmlspecialchars($shoe['price']); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>

  <script>
    var shoeImage = document.getElementById('shoe_image');
    var originalImageSrc = shoeImage.src;
    shoeImage.addEventListener('mouseover', function() {
      this.src = originalImageSrc.replace('.jpg', '-1.jpg');
    });
    shoeImage.addEventListener('mouseout', function() {
      this.src = originalImageSrc;
    });
  </script>
</body>
</html>

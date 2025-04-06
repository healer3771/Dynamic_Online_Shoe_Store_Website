<?php
    // Connect to the database and load session data
    require_once('database.php');
    $db = getDB();
    require_once('store.php');

    // Query all the shoe categories
    $query = "SELECT * FROM shoeCategories";
    $statement1 = $db->query($query);
    $categories = $statement1->fetchAll();

    // Query all the shoes
    $query_Categories = "SELECT * FROM shoes";
    $statement2 = $db->query($query_Categories);
    $shoes = $statement2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoes - SoleCityShoes</title>
  <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
  <!-- Use the unified stylesheet -->
  <link rel="stylesheet" href="home-styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="shoes-page">
  <!-- Header -->
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
        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main-content">
    <div class="shoes-container">
      <h1 class="tableheader">Shoe Categories Elements:</h1>
      
      <?php foreach ($categories as $category): ?>
        <h2 class="categories"><?php echo htmlspecialchars($category['shoeCategoryName']); ?>:</h2>
        <table id="shoes-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category ID</th>
              <th>Code</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>  
            </tr>
          </thead>
          <tbody>
            <?php foreach($shoes as $shoe): ?>
              <?php if($shoe['shoeCategoryID'] == $category['shoeCategoryID']) { ?>
                <tr>
                  <td><?php echo htmlspecialchars($shoe['shoeID']); ?></td>
                  <td><?php echo htmlspecialchars($shoe['shoeCategoryID']); ?></td>
                  <td>
                    <a href="shoe_details.php?id=<?php echo $shoe['shoeID']; ?>">
                      <?php echo htmlspecialchars($shoe['shoeCode']); ?>
                    </a>
                  </td>
                  <td><?php echo htmlspecialchars($shoe['shoeName']); ?></td>
                  <td><?php echo htmlspecialchars($shoe['description']); ?></td>
                  <td><?php echo htmlspecialchars($shoe['price']); ?></td>
                </tr>
              <?php } ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endforeach; ?>
    </div>
  </main>

  <!-- Footer -->
  <footer class="modern-footer">
    <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
  </footer>

  <script src="confirm.js"></script>
</body>
</html>

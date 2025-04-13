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
    // Connect to the database
    require_once('database.php');
    $db = getDB();
    require_once('store.php');

    // Query all the shoes
    $query = "SELECT * FROM shoes";
    $statement = $db->query($query);
    $shoes = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SoleCityShoes</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="home-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="home-page">
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

    <main class="main-content">
        <section class="store-info">
            <h1>Welcome to SoleCityShoe</h1>
            <address>
                <i class="fas fa-map-marker-alt"></i> 78 Dale Avenue, New York City, NY 10001
            </address>
            <div class="description">
                <p>We are a premier shoe store offering a wide range of sneakers, sandals, boots, and high-heeled shoes. Founded in 2005, our mission is to provide top-quality footwear to our customers. SoleCity Shoes is your go-to destination for the latest and trendiest footwear.</p>
            </div>
        </section>

        <div class="product-grid">
            <?php foreach($shoes as $shoe): ?>
                <?php $image_path = "images/{$shoe['shoeID']}.jpg"; ?>
                <div class="product-card">
                    <a href="shoe_details1.php?id=<?php echo $shoe['shoeID']; ?>" class="product-link">
                        <div class="product-image">
                            <img src="<?php echo $image_path; ?>" 
                                 alt="<?php echo htmlspecialchars($shoe['shoeName']); ?>"
                                 onmouseover="this.src='<?php echo str_replace('.jpg', '-1.jpg', $image_path); ?>'"
                                 onmouseout="this.src='<?php echo $image_path; ?>'">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($shoe['shoeName']); ?></h3>
                            <p class="price">$<?php echo number_format($shoe['price'], 2); ?></p>
                            <p class="description"><?php echo htmlspecialchars($shoe['description']); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="modern-footer">
        <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
    </footer>
</body>
</html>

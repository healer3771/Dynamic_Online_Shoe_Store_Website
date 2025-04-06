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
<?php require_once("store.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleCityShoes</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="home-styles.css">
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
                <a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
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
            <?php
            $products = [
                ['image' => 'shoe1-1.jpg', 'name' => 'Handmade Khussas/Juttis', 'price' => 99.99],
                ['image' => 'shoe2-1.jpg', 'name' => 'Indian Khussa with Floral Embroidery', 'price' => 79.99],
                ['image' => 'shoe3-1.jpg', 'name' => 'Black Jutti / Khussa', 'price' => 99.99],
                ['image' => 'shoe4.jpg', 'name' => 'PureRadiance White Khussas', 'price' => 129.99],
                ['image' => 'shoe5.jpg', 'name' => 'MidnightGlimmer Luxury Handmade', 'price' => 149.99],
                ['image' => 'shoe6.jpg', 'name' => "Men's Wedding Shoes", 'price' => 109.99]
            ];

            foreach($products as $product): ?>
            <div class="product-card">
                <img src="images/<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     class="product-image">
                <div class="product-info">
                    <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                    <button class="buy-button">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="modern-footer">
        <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
    </footer>
</body>
</html>

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
session_start();

// Redirect if not logged in
if (!isset($_SESSION['is_valid_admin'])) {
    header("Location: login.php");
    exit();
}

require_once("store.php");
require_once('database.php');
$db = getDB();

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
    <title>SoleCityShoes</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="home-styles.css">
</head>
<body class="home-page">
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

    <?php if(isset($_SESSION['tableData'])): ?>
    <div class="welcome-banner">
        <span>
            <i class="fas fa-user-circle"></i> 
            Welcome <?php echo htmlspecialchars($_SESSION['tableData']['firstName'] . ' ' . $_SESSION['tableData']['lastName']); ?>
            (<?php echo htmlspecialchars($_SESSION['tableData']['emailAddress']); ?>)
        </span>
    </div>
    <?php endif; ?>

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
                    <a href="shoe_details.php?id=<?php echo $shoe['shoeID']; ?>" class="product-link">
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
                            <?php if(isset($_SESSION['tableData'])): ?>
                                <button class="buy-button">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            <?php endif; ?>
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

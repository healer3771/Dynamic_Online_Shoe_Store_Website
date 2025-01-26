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
    <title >SoleCityShoes </title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
        <a href = "home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo" ></a>
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
        <h1>Welcome to SoloCityShoe</h1>
        <address>
            <p><b>Location:</b> 78 Dale Avenue, New York City, NY 10001 </p>
        </address>
        <div class="description">
        <p>We are a premier shoe store offering a wide range of sneakers, sandals, boots, and high-heeled shoes. Founded in 2005, our mission is to provide top-quality footwear to our customers.
        SoleCity Shoes is your go-to destination for the latest and trendiest footwear. We offer a wide range of shoes for men, women, and children, including sneakers, 
            boots, heels, and more. Explore our collection and step up your shoe game today!</p>
            </div>
        <figure>
        <img src="images/shoe1-1.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">Handmade Khussas/Juttis| Ladies handmade Pakistani Indian Khussa Sandal</p>
                <p class="shoe-price"><strong>$99.99</strong></p>
            </figcaption>
        </figure>
        <figure>
        <img src="images/shoe2-1.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">Indian Khussa with Floral Embroidery Jutti for women Bohemian Bridal Flats for Wedding Festive Beads Sandal Mojari</p>
                <p class="shoe-price"><strong>$79.99</strong></p>
            </figcaption>
        </figure><figure>
        <img src="images/shoe3-1.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">Black Jutti / Khussa / Ladies Pakistani Indian Khussa Sandal | Black Khussa Shoes | Afghani Style Shoes |Mojari Jutti</p>
                <p class="shoe-price"><strong>$99.99</strong></p>
            </figcaption>
        </figure><figure>
        <img src="images/shoe4.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">PureRadiance | Handmade White Khussas/Juttis/Ladies handmade Pakistani Indian Khussa Sandal | Handmade Punjabi Jutti | Bridal Flat Shoes</p>
                <p class="shoe-price"><strong>$129.99</strong></p>
            </figcaption>
        </figure><figure>
        <img src="images/shoe5.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">MidnightGlimmer | Luxury Handmade Khussas/Juttis/Ladies Pakistani Indian Khussa Sandal | Punjabi Jutti | Jutti for Sangeet</p>
                <p class="shoe-price"><strong>$149.99</strong></p>
            </figcaption>
        </figure><figure>
        <img src="images/shoe6.jpg" alt="Shoe Image 1" width= "600" style= "margin-left: auto">
        <figcaption>
                <p class="shoe-name">Men's Wedding Shoes, Fabric Jutti, Handmade Clogs, Ethnic Mojari's Shoes, Indian Style, Sherwani Shoes, Groom Shoes, Embellished Shoes.</p>
                <p class="shoe-price"><strong>$109.99</strong></p>
            </figcaption>
        </figure>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>

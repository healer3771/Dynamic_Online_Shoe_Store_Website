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
    <title>Our Story</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
    <!-- Include any additional CSS specific to this page if needed -->
</head>
<body>
    <header>
        <div class="logo">
            <a href="home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo"></a>
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
        <div class = "story">
        <h1>Our Story</h1>
        <p>Our journey to SoleCity Shoes began with a passion for footwear and a vision to create a destination where people could find the perfect pair of shoes to express their unique style. We embarked on a mission to curate a 
            diverse collection of high-quality shoes for men, women, and children, ranging from stylish sneakers to elegant heels and everything in between.</p>
        <p>With dedication and hard work, we scoured the fashion world to bring you the latest trends and timeless classics. Our commitment to exceptional customer service, transparent business practices,
             and a love for shoes has been the driving force behind our store's success.</p>
        <p>At SoleCity Shoes, we invite you to join us on this exciting journey, where fashion meets comfort, and where every step you take is a statement of your individuality. We're thrilled to be a part 
            of your shoe-shopping experience and look forward to helping you find the perfect pair of shoes for every occasion."</p>
            </div>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>

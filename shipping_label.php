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
    <title>Shipping Label</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="label.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href = "home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo" ></a>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="label.css">
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
    <main><link rel="stylesheet" href="label.css">
        <div class="shipping-label">
            <p><b>From Address</b></p>
            <p><?php echo $_GET['fromAddress']; ?></p>
            
            <p><b>To Address</b></p>
            <p><?php echo $_GET['toFirstName'] . ' ' . $_GET['toLastName']; ?><br>
            <?php echo $_GET['toAddress']; ?><br>
            <?php echo $_GET['toCity'] . ', ' . $_GET['toState'] . ' ' . $_GET['toZip']; ?></p>
            
            <p><b>Package Details</b></p>
            <p>Dimensions: <?php echo $_GET['packageLength'] . 'x' . $_GET['packageWidth'] . 'x' . $_GET['packageHeight'] . ' inches'; ?><br>
            Declared Value: $<?php echo $_GET['packageValue']; ?></p>
            
            <p><b>Shipping Information</b></p>
            <p>Shipping Company: <?php echo $_GET['shippingCompany']; ?><br>
            Shipping Class: <?php echo $_GET['shippingClass']; ?><br>
            Ship Date: <?php echo $_GET['shipDate']; ?><br>
            Tracking Number: <?php echo $_GET['trackingNumber']; ?></p>
        </div>
        <div class="label-container">
        <div class="barcode-image">
            <img src="images/shipping label.jpg" alt="Tracking Barcode" width= "500">
        </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>

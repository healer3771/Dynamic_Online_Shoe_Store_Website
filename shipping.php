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
<?php
// Define variables to store error messages
$errors = [];

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $toFirstName = $_POST['toFirstName'];
    $toLastName = $_POST['toLastName'];
    $toAddress = $_POST['toAddress'];
    $toCity = $_POST['toCity'];
    $toState = $_POST['toState'];
    $toZip = $_POST['toZip'];
    $shipDate = $_POST['shipDate'];
    $orderNumber = $_POST['orderNumber'];
    $packageLength = $_POST['packageLength'];
    $packageWidth = $_POST['packageWidth'];
    $packageHeight = $_POST['packageHeight'];
    $packageValue = $_POST['packageValue'];
    $shippingCompany = $_POST['shippingCompany'];
    $shippingClass = isset($_POST['shippingClass']) ? implode(", ", $_POST['shippingClass']) : "";

    // Validation for total declared value of the package
    if ($packageValue > 150) {
        $errors['packageValue'] = "Total declared value cannot exceed $150.";
    }

    // Validation for dimensions of the package
    if ($packageLength > 36 || $packageWidth > 36 || $packageHeight > 36) {
        $errors['packageDimensions'] = "Dimensions of the package cannot exceed 36 inches.";
    }

    // Validation for state and ZIP code (basic checks)
    $validStates = array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY");

    if (!in_array($toState, $validStates) || !preg_match('/^\d{5}$/', $toZip)) {
        $errors['address'] = "Please enter a valid U.S. state and ZIP code.";
    }

    // If there are no errors, proceed to generate the shipping label
    if (empty($errors)) {
        // Redirect to the processing page (process_shipping.php)
        header("Location: shipping.php?" . http_build_query($_POST));
        exit();
    }
    // Prepare the data for the shipping label
$fromAddress = "SoloCityShoe\n78 Dale Avenue\nNew York City, NY 10001";

// Redirect to the shipping label page and pass data as URL parameters
header("Location: shipping_label.php?" . http_build_query([
    'fromAddress' => $fromAddress,
    'toFirstName' => $toFirstName,
    'toLastName' => $toLastName,
    'toAddress' => $toAddress,
    'toCity' => $toCity,
    'toState' => $toState,
    'toZip' => $toZip,
    'shipDate' => $shipDate,
    'orderNumber' => $orderNumber,
    'packageLength' => $packageLength,
    'packageWidth' => $packageWidth,
    'packageHeight' => $packageHeight,
    'packageValue' => $packageValue,
    'shippingCompany' => $shippingCompany,
    'shippingClass' => $shippingClass,
    'trackingNumber' => $trackingNumber
]));

exit(); // Make sure to exit after the header() function
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Label</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
        <a href="home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo"></a>
            <link rel="stylesheet" href="style.css">
            
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
        <h1>Shipping Label</h1>
        <!-- Display error messages if there are any -->
        <?php if (!empty($errors)): ?>
        <div class="error-message">
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <form action="process_shipping.php" method="post">
            <label for="toFirstName">First Name:</label>
            <input type="text" id="toFirstName" name="toFirstName" placeholder="Must Be Vliad First Name" required><br>
            
            <label for="toLastName">Last Name:</label>
            <input type="text" id="toLastName" name="toLastName" placeholder="Must Be Valid Last Name" required><br>
            
            <label for="toAddress">Street Address:</label>
            <input type="text" id="toAddress" name="toAddress" placeholder="Must Be Valid Address" required><br>
            
            <label for="toCity">City:</label>
            <input type="text" id="toCity" name="toCity" placeholder="Must Be Valid City" required><br>
            
            <label for="toState">State:</label>
            <input type="text" id="toState" name="toState" placeholder="In 'CA' Format" required><br>
            
            <label for="toZip">Zip Code:</label>
            <input type="text" id="toZip" name="toZip" placeholder="Must Be 5 Digits Valid ZIP" required pattern="\d{5}"><br>
            
            <label for="shipDate">Ship Date:</label>
            <input type="date" id="shipDate" name="shipDate" placeholder="Must Be Valid Date" required><br>
            
            <label for="orderNumber">Order Number:</label>
            <input type="text" id="orderNumber" name="orderNumber" placeholder="Must be Valid" required><br>
            
            <label for="packageLength">Package Length (in inches):</label>
            <input type="number" id="packageLength" name="packageLength" placeholder="Max Length is 36" required max="36"><br>
            
            <label for="packageWidth">Package Width (in inches):</label>
            <input type="number" id="packageWidth" name="packageWidth" placeholder="Mac Width is 36" required max="36"><br>
            
            <label for="packageHeight">Package Height (in inches):</label>
            <input type="number" id="packageHeight" name="packageHeight" placeholder="Max Height is 36" required max="36"><br>
            
            <label for="packageValue">Total Declared Value ($):</label>
            <input type="number" id="packageValue" name="packageValue" placeholder="Max Price is $150" required max="150"><br>
            
            <label for="shippingCompany">Shipping Company:</label>
            <select id="shippingCompany" name="shippingCompany" required>
                <option value="USPS">USPS</option>
                <option value="UPS">UPS</option>
                <option value="FedEx">FedEx</option>
            </select><br>
            
            <label for="shippingClass">Shipping Class:</label>
            <input type="checkbox" id="shippingClass" name="shippingClass[]" value="Next Day Air">Next Day Air
            <input type="checkbox" id="shippingClass" name="shippingClass[]" value="Priority Mail">Priority Mail<br>
            
            <input type="submit" value="Generate Shipping Label">
        </form>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>

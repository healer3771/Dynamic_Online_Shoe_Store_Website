<?php require_once("store.php"); ?>
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
            'shippingClass' => $shippingClass
        ]));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Label - SoleCityShoes</title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <!-- Use the same stylesheet as other pages -->
    <link rel="stylesheet" href="home-styles.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="shipping-page">
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
        <div class="shipping-container">
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
                <input type="text" id="toFirstName" name="toFirstName" placeholder="Must be valid first name" required>
                
                <label for="toLastName">Last Name:</label>
                <input type="text" id="toLastName" name="toLastName" placeholder="Must be valid last name" required>
                
                <label for="toAddress">Street Address:</label>
                <input type="text" id="toAddress" name="toAddress" placeholder="Must be valid address" required>
                
                <label for="toCity">City:</label>
                <input type="text" id="toCity" name="toCity" placeholder="Must be valid city" required>
                
                <label for="toState">State:</label>
                <input type="text" id="toState" name="toState" placeholder="In 'CA' format" required>
                
                <label for="toZip">Zip Code:</label>
                <input type="text" id="toZip" name="toZip" placeholder="Must be 5 digits" required pattern="\d{5}">
                
                <label for="shipDate">Ship Date:</label>
                <input type="date" id="shipDate" name="shipDate" required>
                
                <label for="orderNumber">Order Number:</label>
                <input type="text" id="orderNumber" name="orderNumber" placeholder="Must be valid" required>
                
                <label for="packageLength">Package Length (in inches):</label>
                <input type="number" id="packageLength" name="packageLength" placeholder="Max length is 36" required max="36">
                
                <label for="packageWidth">Package Width (in inches):</label>
                <input type="number" id="packageWidth" name="packageWidth" placeholder="Max width is 36" required max="36">
                
                <label for="packageHeight">Package Height (in inches):</label>
                <input type="number" id="packageHeight" name="packageHeight" placeholder="Max height is 36" required max="36">
                
                <label for="packageValue">Total Declared Value ($):</label>
                <input type="number" id="packageValue" name="packageValue" placeholder="Max value is $150" required max="150">
                
                <label for="shippingCompany">Shipping Company:</label>
                <select id="shippingCompany" name="shippingCompany" required>
                    <option value="USPS">USPS</option>
                    <option value="UPS">UPS</option>
                    <option value="FedEx">FedEx</option>
                </select>
                
                <label for="shippingClass">Shipping Class:</label>
                <input type="checkbox" name="shippingClass[]" value="Next Day Air">Next Day Air
                <input type="checkbox" name="shippingClass[]" value="Priority Mail">Priority Mail
                
                <input type="submit" value="Generate Shipping Label">
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="modern-footer">
        <p>&copy; <?php echo date('Y'); ?> SOLOCITYSHOE</p>
    </footer>
</body>
</html>

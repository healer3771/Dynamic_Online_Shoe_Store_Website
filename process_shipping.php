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
// Get the form data from the Shipping page
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

// Generate a tracking number (example only)
$trackingNumber = "TRACK123456";

// You can generate a barcode image for the tracking number here, but I'll leave that as an exercise for you.

// Prepare the data for the shipping label
$fromAddress = "My Shoe Store\n123 Main Street\nNew York, NY 10001";

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
?>

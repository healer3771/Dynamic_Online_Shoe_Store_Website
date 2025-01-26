<?php
include('database.php');
$db = getDB();
// Get shoe ID
$shoeID = $_GET['id'];

// Validate 
if (!is_numeric($shoeID)) {
  echo "Invalid shoe ID";
  exit;
}
//create image path
$image_path = "images/{$shoeID}.jpg";

// Query shoe
$sql = "SELECT * FROM shoes WHERE shoeID = :shoeID"; 

$stmt = $db->prepare($sql);
$stmt->bindValue(':shoeID', $shoeID);
$stmt->execute();

$shoe = $stmt->fetch();

// Check if shoe found
if (!$shoe) {
  echo "Shoe not found!";
  exit;
}

    // Query all the shoe categories
    $query = "SELECT * FROM shoeCategories";
    $statement1 = $db->query($query);
    $categories = $statement1->fetchAll();
?>

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
                <!-- Navigation links -->
                <li><a href="home1.php">Home</a></li>
                <li><a href="ourstory1.php">OurStory</a></li>
                <li><a href="shoes1.php">Shoes</a></li>
                <li><a href="login.php">Login</a></li>
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
        <div>
        <h2>Shoes Deatils Of <?php echo $shoe['shoeName']; ?></h2>
        <img src=<?php echo($image_path)?> alt="Shoe Image" width= "400" style= "margin-left: 120px" id="shoe_image">
        <table id="shoes-table">
            <tr>
                <th>ID</th>
                <th>shoeCategoryID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>  
            </tr>
            <tr>
                <td><?php echo $shoe['shoeID']; ?></td>
                <td><?php echo $shoe['shoeCategoryID']; ?></td>
                <td><?php echo $shoe['shoeCode']; ?></td>
                <td><?php echo $shoe['shoeName']; ?></td>
                <td><?php echo $shoe['description']; ?></td>
                <td><?php echo $shoe['price']; ?></td>
            </tr>
        </table>
        </div>
        <script>
            var shoeImage = document.getElementById('shoe_image');
            var originalImageSrc = shoeImage.src;

            shoeImage.addEventListener('mouseover', function() {
                this.src = originalImageSrc.replace('.jpg', '-1.jpg');
            });

            shoeImage.addEventListener('mouseout', function() {
                this.src = originalImageSrc;
            });
        </script>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>
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

    // Query all the shoe categories
    $query = "SELECT * FROM shoeCategories";
    $statement1 = $db->query($query);
    $categories = $statement1->fetchAll();

    // Query all the shoes
    $query_Categories = "SELECT * FROM shoes";
    $statement2 = $db->query($query_Categories);
    $shoes = $statement2->fetchAll();
?>

<html lang='en'>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >ShoeTables </title>
    <link rel="icon" type="image/x-icon" href="images/Solocityshoeicon.png">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
      <header>
        <div class="logo">
          <!-- SoleCityShoes Logo with a link to the home page -->
          <a href="home.php"><img src="images/Solocityshoe.png" alt="SoleCityShoes Logo"></a>
        </div>
        <nav>
            <ul>
                <!-- Navigation links -->
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
      <h1 class="tableheader">Shoe Categories Elements:</h1>

        <?php foreach ($categories as $category): ?>
          <!-- Loop through the results of shoe categories and display them in a table -->
          <h2 class = "categories"> <?php echo $category['shoeCategoryName'] ?>: </h2>
          <table id="shoes-table">
        <tr>
          <th>ID</th>
          <th>shoeCategoryID</th>
          <th>Code</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>  
        </tr>
          <?php foreach($shoes as $shoe): ?>
            <?php if($shoe['shoeCategoryID'] == $category['shoeCategoryID'] ){ ?>
              <tr>
              <td><?php echo $shoe['shoeID']; ?></td>
              <td><?php echo $shoe['shoeCategoryID']; ?></td>
              <td><a href="shoe_details.php?id=<?php echo $shoe['shoeID']; ?>"><?php echo $shoe['shoeCode']; ?></td>
              <td><?php echo $shoe['shoeName']; ?></td>
              <td><?php echo $shoe['description']; ?></td>
              <td><?php echo $shoe['price']; ?></td>
              <td>
                <div>
                <form action = "delete_shoe.php" method="post" onsubmit="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS SECTION')">
                  <input type="hidden" name="shoeID" value="<?php echo $shoe['shoeID']; ?>" />
                  <input type="hidden" name="shoeCategoryID" value="<?php echo $shoe['shoeCategoryID']; ?>" />
                  <input type="submit" value="Delete"/>
                </form>
                </div>
              </td>
            </tr>
            <?php } ?>
          <?php endforeach; ?>

            </table>
        <?php endforeach; ?>

      </table>
      <footer>
        <!-- Copyright notice for the footer -->
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
    <script src="confirm.js"></script>
  </body>
</html>

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
if(!isset($login_message)){
    $login_message = "You must login to view the Main Page";
}
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
                <li><a href="home1.php">Home</a></li>
                <li><a href="ourstory1.php">OurStory</a></li>
                <li><a href="shoes1.php">Shoes</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Login</h2>
        <form action="authenticate.php" method="post">
            <label>Email:</label>
            <input type="text" name="email" value="" placeholder="Enter Email" required autofocus/>
            <br>
            <label>Password:</label>
            <input type="password" name="password" value="" placeholder="Enter Password" required/>
            <br>
            <input type="submit" value="Login"/>
        </form>
        <p><?php echo $login_message ?> </p>
    </main>
    <footer>
        <p>&copy; 2023 SOLOCITYSHOE</p>
    </footer>
</body>
</html>

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
<html>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["is_valid_admin"])) {
            ?>
            <p>
                <a href="logout.php">Logout</a>
            </p>
        <?php } else { ?>
            <p>
                <a href="login.php">Login</a>
            </p>
        <?php } ?>
    </body>
</html>
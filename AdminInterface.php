<?php

session_start();
include("connection.php");
include("adminfunctions.php");
$admin_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" type="text/css" href="css/admininterface.css">
</head>
<body>

    <header>
        <img src="images/logo.png" alt="Department of Agriculture Logo" onclick="showConfirmation()" style="cursor: pointer;" title="Click to return home page">
        
        <script>
            function showConfirmation() {
                var confirmation = confirm("Do you want to return to the home page?");
                if (confirmation) {
                    window.location.href = "Home.html";
                } 
                else{}
            }
        </script>

        <h2>Ecological Farming and Services </h2>
    </header>

    <nav>
        <ul>
            <li><a href="Home.html">
                <button class="navbutton">Home</button>
            </a></li>
            <li><a href="Services.html">
                <button class="navbutton" >Services</button>
            </a></li>
            <li><a href="LoginPage.php">
                <button class="navbutton">Login</button>
            </a></li>
            <li><a href="Home.html#contact-us">
                <button class="navbutton">Contact us</button>
            </a></li>
        </ul>
    </nav>

    <div class="topic">  
        <a href="LoginPage.php">
        <button type="submit" class="button">Back to Login page</button>
        </a> 
        <h1>Admin Home</h1>
        <a href="adminlogout.php">
        <button type="submit" class="button">Log out as Admin</button>
        </a>
    </div>
    
    <div class="container">  
        <a href="AdminSettings.php"><button class="button" style="width: 400px; height: 100px;">Admin Settings</button></a>
        <a href="OfficerSettings.php"><button class="button"style="width: 400px; height: 100px;">Officer Settings</button></a>
        <a href="FarmerSettings.php"><button class="button"style="width: 400px; height: 100px;">Farmer Settings</button></a> 
    </div>

    <section class="contact-us">
        <div class="info1">
            <h2><u>Contact Us</u></h2>
            <p>Address: Department of Agriculture, P.O.Box. 1, Peradeniya, Sri Lanka</p>
            <p>Email: info@doa.gov.lk</p>
            <p>Agri field problems : 1920</p>
        </div>
        <div class="info2">
            <p>&nbsp;</p>
            <p>Hotline: +94 812 388331/32/34</p>
            <p>Head Office: +94 812 388333</p>
            <p> Open hours: Mon to Fri - 8.30am to 4.15pm (Closed on weekends and public holidays)</p>
        </div>
        
    </section>

    <footer>
            <p>&copy; 2023 Department of Agriculture</p>
            <p>All rights resvered</p>
        
    </footer>

</body>
</html>

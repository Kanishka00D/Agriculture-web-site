<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="css/stylesloginpage.css">
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

    <div class="container">
    <a href="AdminLogin.php"><button class="button" style="width: 400px; height: 100px;">Log in as an Admin</button></a>
    <a href="OfficerLogin.php"><button class="button"style="width: 400px; height: 100px;">Log in as a Field Officer</button></a>
    <a href="FarmerLogin.php"><button class="button"style="width: 400px; height: 100px;">Log in as a Farmer</button></a>
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

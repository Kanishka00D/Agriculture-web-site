<?php 
	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$farmer_email = $_POST['farmeremail'];
		$farmer_password = $_POST['farmerpw'];
        $farmer_name = $_POST['farmername'];
        $farmer_phone = $_POST['farmerphone'];
        $farmer_province = $_POST['farmerprovince'];
        $farmer_corps = '';
            if (isset($_POST['Rice'])) {
                $farmer_corps .= 'Rice, ';
            }
            if (isset($_POST['Tea'])) {
                $farmer_corps .= 'Tea, ';
            }
            if (isset($_POST['Fruit'])) {
                $farmer_corps .= 'Fruit, ';
            }
            if (isset($_POST['vegetables'])) {
                $farmer_corps .= 'vegetables, ';
            }
            if (isset($_POST['oilseed'])) {
                $farmer_corps .= 'oilseed, ';
            }
            $farmer_corps = rtrim($farmer_corps, ', ');
        $starting_date = $_POST['dop'];
        $gn = $_POST['fgn'];
        $service_center = $_POST['fasc'];
        $f_id = random_num(20);
        
        $query = "insert into farmer (f_id,farmer_email,farmer_password,farmer_name,farmer_phone,farmer_province,farmer_corps,starting_date,gn,service_center) values ('$f_id','$farmer_email','$farmer_password','$farmer_name','$farmer_phone','$farmer_province','$farmer_corps','$starting_date','$gn','$service_center')";

			mysqli_query($con, $query);

			header("Location: FarmerSettings.php");
			die;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="css/CreateAccount.css">
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
    
    <div class="box">
        <h2>Create account for the Farmer</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name" name="farmername" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" placeholder="Enter your phone number" name="farmerphone" required>
            </div>
            <div class="form-group">
                <label for="Province">Province</label>
                <select id="Province" required name="farmerprovince">
                    <option value="Central">Central Province</option>
                    <option value="North Central">North Central Province</option>
                    <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                    <option value="Uva Province">Uva Province</option>
                    <option value="North Western">North Western Province</option>
                    <option value="Eastern">Eastern Province</option>
                    <option value="Western">Western Province</option>
                    <option value="Southern">Southern Province</option>
                    <option value="Northern">Northern Province</option>
                </select>
            </div>
            <div class="form-group1">
                <p>Corps: </p>
                <label for="Rice">
                    <input type="checkbox" id="Rice" name="Rice"> Rice</label>
                <label for="Tea">
                    <input type="checkbox" id="Tea"name="Tea"> Tea</label>
                <label for="Fruit">
                    <input type="checkbox" id="Fruit" name="Fruit"> Fruit</label>
                <label for="vegetables">
                    <input type="checkbox" id="vegetables" name="vegetables"> vegetables</label>
                <label for="oilseed">
                    <input type="checkbox" id="oilseed" name="oilseed"> oilseed</label>
            </div>
            <div class="form-group">
                <label for="Date of Planting">Starting Date of Plantation: </label>
                <input type="date" id="dop" required name="dop">
            </div>
            <div class="form-group">
                <label for="GN">GN Division: </label>
                <input type="text" id="GN" required name="fgn">
            </div>
            <div class="form-group">
                <label for="Agrarian Service Center">Agrarian Service Center: </label>
                <input type="text" id="asc" required name="fasc">
            </div>
            <div class="form-group">
                <label for="farmeremail">Enter farmer Email: </label>
                <input type="email" id="farmeremail" name="farmeremail" required>
            </div>
            <div class="form-group">
                <label for="farmerpw">Enter a password: </label>
                <input type="text" id="farmerpw" name="farmerpw" required>
            </div>
            <button type="submit" class="button" >Create Account</button>
        </form>
    </div>

    <footer>
            <p>&copy; 2023 Department of Agriculture</p>
            <p>All rights resvered</p>
        
    </footer>

</body>
</html>

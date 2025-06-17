<?php 
session_start();

	include("connection.php");
	include("adminfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];
        $admin_id = random_num(20);
        $admin_name = $_POST['admin_name'];
        
        $query = "insert into admin (admin_id,admin_username,admin_password,admin_name) values ('$admin_id','$admin_username','$admin_password','$admin_name')";

			mysqli_query($con, $query);

			header("Location: AdminSettings.php");
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
        <h2>Create account for the Admin</h2>
        <form method="post">
        <div class="form-group">
                <label for="adminname">Enter Admin name</label>
                <input type="text" id="adminname" placeholder="Enter new admin name" name="admin_name" required>
            </div>
            <div class="form-group">
                <label for="adminusername">Enter a Username</label>
                <input type="text" id="adminusername" placeholder="Enter new admin username" name="admin_username" required>
            </div>
            <div class="form-group">
                <label for="adminpassword">Enter a password: </label>
                <input type="text" id="adminpassword" name="admin_password" placeholder="Enter new admin password" required>
            </div>
            <button type="submit" class="button">Create admin Account</button>
        </form>
    </div>

    <footer>
            <p>&copy; 2023 Department of Agriculture</p>
            <p>All rights resvered</p>
        
    </footer>

</body>
</html>

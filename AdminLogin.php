<?php 

session_start();

	include("connection.php");
	include("adminfunctions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$admin_username = $_POST['admin_username'];
		$admin_password = $_POST['admin_password'];

			$query = "select * from admin where admin_username = '$admin_username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['admin_password'] === $admin_password)
					{

						$_SESSION['admin_id'] = $admin_data['admin_id'];
						header("Location: AdminInterface.php");
						die;
					}
				}
			}
			
        $_SESSION['login_error'] = "*Wrong username or password!";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" href="css/Login.css">
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
        <div class="box">
            <h2>Admin Login</h2>
            <?php
            if(isset($_SESSION['login_error'])){
            echo '<p style="color: red;">'.$_SESSION['login_error'].'</p>';
            unset($_SESSION['login_error']);
            }
            ?>

            <form method="post">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="admin_username" placeholder="Enter your username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="admin_password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="button">Login</button>
            </form>
        </div>
    </div>

    <footer>
            <p>&copy; 2023 Department of Agriculture</p>
            <p>All rights resvered</p>
        
    </footer>

</body>
</html>

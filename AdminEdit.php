<?php
session_start();
include("connection.php");
include("adminfunctions.php");

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE id = '$admin_id'";
    $result = $con->query($sql);

    if ($result !== null) {
        $admin_data = $result->fetch_assoc();
    } else {
        echo "admin not found.";
        die();
    }
} else {
    echo "admin ID is missing.";
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_name = $_POST['admin_name'];

    $update_sql = "UPDATE admin SET
        admin_name = '$admin_name',
        admin_password = '$admin_password',
        admin_username= '$admin_username'
        WHERE id = '$admin_id'";

    if ($con->query($update_sql)) {
        header("Location: AdminSettings.php");
        die();
    } else {
        echo "Error updating data: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin edit Interface</title>
    <link rel="stylesheet" href="css/edit.css">
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
        <h1>Admin edit interface</h1> 
        
    </div>

    <div class="container">
        <div class="box">
            
            <h3>Edit Your Details</h3>
            <form method="post">
        <div class="form-group">
                <label for="adminname">Edit Admin name</label>
                <input type="text" id="adminname" value="<?php echo $admin_data['admin_name']; ?>" name="admin_name" required>
            </div>
            <div class="form-group">
                <label for="adminusername">Edit Username</label>
                <input type="text" id="adminusername" value="<?php echo $admin_data['admin_username']; ?>" name="admin_username" required>
            </div>
            <div class="form-group">
                <label for="adminpassword">Edit password: </label>
                <input type="text" id="adminpassword" name="admin_password" value="<?php echo $admin_data['admin_password']; ?>" required>
            </div>
            <button type="submit" class="button">Update admin Account</button>
        </form>
        </div>

        
    </div>



<footer>
        <p>&copy; 2023 Department of Agriculture</p>
        <p>All rights resvered</p>
    
</footer>
<script src="JavaScript/script.js"></script>
</body>
</html>
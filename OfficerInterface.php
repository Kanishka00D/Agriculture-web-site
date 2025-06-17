<?php
session_start();
include("connection.php");
include("officerfunctions.php");

$officer_data = check_login($con);

$sql = "SELECT * FROM query";
$result = $con->query($sql);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    
    if (isset($_POST['update'])) {
        $officer_username = $officer_data['officer_username'];
        $officer_password = $_POST['officerpassword'];
        $officer_name = $_POST['officername'];
        $officer_phone = $_POST['officerphone'];
        $officer_province = $_POST['officerprovince'];
        $service_center = $_POST['fasc'];

        $query = "UPDATE officer SET 
        officer_name = '$officer_name',
        officer_contact = '$officer_phone',
        officer_province = '$officer_province'
        WHERE officer_username = '$officer_username'";

        
        if (mysqli_query($con, $query)) {
            echo '<script>alert("Details updated successfully!");</script>';
            header("Location: OfficerInterface.php");
            die;
        } else {
            echo '<script>alert("Error updating profile. Please try again later.");</script>';
        } 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Interface</title>
    <link rel="stylesheet" href="css/officerinterface.css">
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
        <h1>Welcome to Officer interface</h1> 
        <a href="officerlogout.php">
        <button type="submit" class="button" ondblclick="submission()">Log out</button>
        </a>
        
    </div>

    <div class="container">
        <div class="box">
            
            <h3>Hello, Mr. <?php echo $officer_data['officer_name']; ?></h3>
            <h3><u>About us</u></h3>
            <p>"At the Department of Agriculture, we are committed to promoting sustainable and environmentally friendly agricultural practices through our Ecological Farming division. 
                Our journey towards a greener, healthier, and more sustainable future began with a deep appreciation for the environment and a vision to transform farming practices. 
                We believe that ecological farming not only ensures food security but also safeguards the planet's ecosystems for future generations."</p>
                <h3><u>Our Vision</u></h3>
            <p>"A world where agriculture is a force for good, where farmers are stewards of the land, and where the food we produce is not only abundant but also environmentally 
                responsible. We envision a future where ecological farming is the norm, conserving biodiversity, reducing greenhouse gas emissions, and ensuring that agriculture 
                remains a cornerstone of human civilization while protecting our planet's precious resources."</p>
                <h3><u>Our Mission</u></h3>
            <p>“To lead the transformation of agriculture towards ecological and sustainable farming practices, ensuring a harmonious coexistence between human activities and nature. 
                We are committed to providing farmers with the knowledge, tools, and support they need to adopt eco-friendly farming methods while contributing to the global effort 
                to combat climate change.”</p>
                <h3><u>Our Objectives</u></h3>
            <p>"Maintaining and increasing productivity and production of the food crop sector for the purpose of enhancing the income and living condition of the farmer 
                and making food available at affordable prices to the consumer.</p>
            
        </div>

        <div class="box">
            
            <h3>Edit Your Details</h3>
            <form method="post" class="forms">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" value="<?php echo $officer_data['officer_name']; ?>" name="officername" >
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" value="<?php echo $officer_data['officer_contact']; ?>" name="officerphone">
                </div>
                <div class="form-group">
                    <label for="Province">Province</label>
                    <select id="Province" name="officerprovince">
                        <option value="<?php echo $officer_data['officer_province']; ?>"><?php echo $officer_data['officer_province']; ?></option>    
                        <option value="Central">Central Province</option>
                        <option value="North Central">North Central Province</option>
                        <option value="Sabaragamuwa">Sabaragamuwa Province</option>
                        <option value="Uva ">Uva Province</option>
                        <option value="North Western">North Western Province</option>
                        <option value="Eastern">Eastern Province</option>
                        <option value="Western">Western Province</option>
                        <option value="Southern">Southern Province</option>
                        <option value="Northern">Northern Province</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Agrarian Service Center">Agrarian Service Center: </label>
                    <input type="text" id="asc" value="<?php echo $officer_data['service_center']; ?>" name="fasc" readonly>
                </div>
                <div class="form-group">
                    <label for="officerusername">Your username:</label>
                    <input type="email" id="officerusername" value="<?php echo $officer_data['officer_username']; ?>" name="officeruername" readonly>
                </div>
                <div class="form-group">
                    <label for="officerpassword">Enter a password: </label>
                    <input type="text" id="officerpassword" value="<?php echo $officer_data['officer_password']; ?>" name="officerpassword" readonly>
                </div>
                <button type="submit" class="button" name="update">Update details</button>
            </form>
            <p>please contact admin to change service center,username and password</p>
            
        </div>

            

        
    </div>

    <div class="box">
            <h3>Queries</h3>
            <table border="1">
    <tr>
        <th>id</th>
        <th>Farmer Name</th>
        <th>Service</th>
        <th>Contact No.</th>
        <th>Province</th>
        <th>Query</th>
        <th>Action</th>


    </tr>
    <?php
        if ($result !== null) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['farmer_name']}</td>
                    <td>{$row['service']}</td>
                    <td>{$row['farmer_phone']}</td>
                    <td>{$row['farmer_province']}</td>
                    <td>{$row['query']}</td>
                    <td>
                        <a href='QueryDelete.php?id=$row[id]'>
                            <button type='button' class='button'>Delete</button>
                        </a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
</table>


        </div>   

<footer>
        <p>&copy; 2023 Department of Agriculture</p>
        <p>All rights resvered</p>
    
</footer>
<script src="JavaScript/script.js"></script>


</body>
</html>

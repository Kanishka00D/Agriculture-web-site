<?php
session_start();

if (isset($_SESSION['officer_id'])) {
    echo '<script>
        if (confirm("Do you really want to log out?")) {
            window.location.href = "OfficerLogin.php";
        } else {
            window.location.href = "OfficerInterface.php";
        }
    </script>';
} else {
    header("Location: AdminLogin.php");
    die;
}
?>
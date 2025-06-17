<?php
session_start();
include("connection.php");
include("adminfunctions.php");

if (isset($_GET['id'])) {
    $query_id = $_GET['id'];
    $delete_sql = "DELETE FROM query WHERE id = '$query_id'";

    if ($con->query($delete_sql)) {
        header("Location: OfficerInterface.php");
        die();
    } else {
        echo "Error deleting data: " . $con->error;
    }
} else {
    echo "Query ID is missing.";
    die();
}
?>

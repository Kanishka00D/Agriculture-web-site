<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecological farming";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
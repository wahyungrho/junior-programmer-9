<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db-tes-batara-guru";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    # code...
    die("Connection failed: " . mysqli_connect_error());
}

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$database = "student_performance";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $database, $port);

?>
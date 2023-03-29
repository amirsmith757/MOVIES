<?php

$servername = "localhost";
$username = "asmith404";
$password = "U6adxN4fT1cMjCSy";
$dbname = "asmith404";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
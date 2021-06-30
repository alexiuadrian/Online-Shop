<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbName = "online_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $pass, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
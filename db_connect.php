<?php
$servername = "localhost";
$username = "root";
$password = "5692";
$database = "dbitphp";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php

$servername = "localhost";
$username = "firas";
$password = "susa";
$db = "webProject";

$link='localhost';
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

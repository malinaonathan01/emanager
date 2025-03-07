<?php
session_start();

$servername = "localhost";
$username = "em_streamug";
$password = "@@@o4o1o8SM";
$dbname = "em_streamug";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
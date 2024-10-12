<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faq_db"; // Use the correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fruit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected!";
$sql = "CREAT TABLE IF NOT EXISITS fruits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
color VARCHAR(30) NOT NULL,
price DECIMAL(5,2) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";


$conn->close();
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CookingDatabase";


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}


$conn->select_db($dbname);


$sql = "CREATE TABLE IF NOT EXISTS Classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(100) NOT NULL,
    class_fee DECIMAL(10, 2) NOT NULL,
    class_date DATE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'Classes' created successfully<br>";
} else {
    echo "Error creating table 'Classes': " . $conn->error . "<br>";
}


$sql = "CREATE TABLE IF NOT EXISTS Instructor (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NOT NULL,
    instructor_name VARCHAR(100) NOT NULL,
    experience_years INT NOT NULL,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'Instructor' created successfully<br>";
} else {
    echo "Error creating table 'Instructor': " . $conn->error . "<br>";
}


$sql = "INSERT INTO Classes (class_name, class_fee, class_date) VALUES
    ('Baking 101', 60.00, '2024-12-01'),
    ('Cooking Basics', 45.00, '2024-12-10'),
    ('Advanced Baking', 75.00, '2024-12-15')";
$conn->query($sql);


$sql = "INSERT INTO Instructor (class_id, instructor_name, experience_years) VALUES
    (1, 'Chef Alice', 10),
    (2, 'Chef Bob', 5),
    (3, 'Chef Charlie', 8)";
$conn->query($sql);


$sql = "SELECT i.instructor_name, c.class_name, c.class_fee 
        FROM Instructor i
        JOIN Classes c ON i.class_id = c.class_id
        WHERE c.class_fee > 50";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<h2>Instructors teaching classes with fees above $50:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "Instructor Name: " . $row['instructor_name'] . "<br>";
        echo "Class Name: " . $row['class_name'] . "<br>";
        echo "Class Fee: $" . $row['class_fee'] . "<br><br>";
    }
} else {
    echo "No instructors found for classes with fees above $50.";
}


$conn->close();
?>

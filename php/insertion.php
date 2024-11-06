<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fruit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'fruit' table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS fruit (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    color VARCHAR(30) NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $color = $price = "";
$nameErr = $colorErr = $priceErr = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Fruit name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["color"])) {
        $colorErr = "Fruit color is required";
    } else {
        $color = test_input($_POST["color"]);
    }

    if (empty($_POST["price"])) {
        $priceErr = "Fruit price is required";
    } else {
        $price = test_input($_POST["price"]);
        if (!is_numeric($price) || $price <= 0) {
            $priceErr = "Price must be a positive number";
        }
    }

    // If no errors, insert data into database
    if (empty($nameErr) && empty($colorErr) && empty($priceErr)) {
        $sql = "INSERT INTO fruit (name, color, price) VALUES ('$name', '$color', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "New record has been added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Fruits</title>
</head>
<body>
    <h2>Add New Fruit</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        Fruit Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>

        Fruit Color: <input type="text" name="color" value="<?php echo $color; ?>">
        <span class="error"><?php echo $colorErr;?></span>
        <br><br>

        Price: <input type="text" name="price" value="<?php echo $price; ?>">
        <span class="error"><?php echo $priceErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Add Fruit">
    </form>
</body>
</html>

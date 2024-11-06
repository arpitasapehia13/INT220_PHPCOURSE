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

// Create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS fruit (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    color VARCHAR(30) NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Variables for form data
$name = $color = $price = "";
$nameErr = $colorErr = $priceErr = "";
$id = 0;
$edit_mode = false;

// Handle Create and Update
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

    // If no errors, insert or update data
    if (empty($nameErr) && empty($colorErr) && empty($priceErr)) {
        if (isset($_POST['id']) && $_POST['id'] != 0) {
            // Update existing record
            $id = $_POST['id'];
            $sql = "UPDATE fruit SET name='$name', color='$color', price='$price' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Fruit updated successfully!";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Insert new record
            $sql = "INSERT INTO fruit (name, color, price) VALUES ('$name', '$color', '$price')";
            if ($conn->query($sql) === TRUE) {
                echo "New fruit added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM fruit WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Fruit deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Handle Edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM fruit WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $edit_mode = true;
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $color = $row['color'];
        $price = $row['price'];
    }
}

// Fetch all records
$sql = "SELECT * FROM fruit";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fruit CRUD</title>
</head>
<body>

<h2><?php echo $edit_mode ? "Update Fruit" : "Add New Fruit"; ?></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="id" value="<?php echo $edit_mode ? $id : 0; ?>">
    Fruit Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr;?></span><br><br>

    Fruit Color: <input type="text" name="color" value="<?php echo $color; ?>">
    <span class="error"><?php echo $colorErr;?></span><br><br>

    Price: <input type="text" name="price" value="<?php echo $price; ?>">
    <span class="error"><?php echo $priceErr;?></span><br><br>

    <input type="submit" name="submit" value="<?php echo $edit_mode ? 'Update' : 'Add'; ?>">
</form>

<h2>Fruits List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Color</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["color"] . "</td><td>" . $row["price"] . "</td>";
            echo "<td>
                    <a href='?edit=" . $row["id"] . "'>Edit</a> | 
                    <a href='?delete=" . $row["id"] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
                  </td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>

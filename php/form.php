<!DOCTYPE html>
<html lang="en">
<head>
    <title>Validation</title>
</head>
<body>

<h2>Simple PHP Form Example</h2>

<?php
// Initialize variables
$name = $email = $website = $age = $comment = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $age = test_input($_POST["age"]);
    $comment = test_input($_POST["comment"]);
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- Form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    Website: <input type="text" name="website">
    <br><br>
    Age: <input type="number" name="age">
    <br><br>
    Comment: <textarea name="comment"></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- <?php
// Display the submitted data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Your Input:</h2>";
    echo "Name: " . $name;
    echo "<br>";
    echo "Email: " . $email;
    echo "<br>";
    echo "Website: " . $website;
    echo "<br>";
    echo "Age: " . $age;
    echo "<br>";
    echo "Comment: " . $comment;
}
?> -->

</body>
</html>

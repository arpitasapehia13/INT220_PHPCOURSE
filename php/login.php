<?php
session_start();
// Dummy login data
$valid_username = 'mamta';
$valid_password = '123';
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == $valid_username && $password == $valid_password) {
        // Storing login status in session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "Login successful! Welcome " . $_SESSION['username'];
    } else {
        echo "Invalid username or password.";
    }
}
if (!isset($_SESSION['loggedin'])) {
?>
    <!-- Simple HTML login form -->
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Result Checker</title>
</head>
<body>
    <?php
    if (isset($_POST["marks"])) {
        $marks = $_POST["marks"];

        if ($marks >= 0 && $marks < 30) {
            echo "Fail! Try Again";
        } elseif ($marks >= 30 && $marks < 50) {
            echo "Good to go! You can do well!";
        } elseif ($marks >= 50) {
            echo "Kudos to you!";
        } else {
            echo "Invalid marks input!";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="marks">Marks:</label>
        <input type="number" name="marks" id="marks" min="0" max="100" required><br><br>

        <input type="submit" value="Check Result">
    </form>
</body>
</html>

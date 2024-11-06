<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Letter in my name</title>
</head>
<body>
<body>
    <?php
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
        $letter_count = strlen(str_replace(' ', '', $name));//Exclude the spaces

        echo "<p>Hi, $name</p>";
        echo "<p>Your name has $letter_count letters.</p>";
    }
    ?>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="inputName">Name:</label>
        <input type="text" name="name" id="inputName" required><br><br>

        <input type="submit" value="Check Name Length">
    </form>
</body>
</html>
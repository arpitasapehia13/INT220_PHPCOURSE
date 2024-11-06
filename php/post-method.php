<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Example of PHP POST</title>
</head>
<body>
    <?php
    if(isset($_POST["age"])){
        echo "HI,YOUR AGE IS:".$_POST["age"]."<br>";
    }
    ?>

    <form method = "post" action = "<?php echo $_SERVER["PHP_SELF"];?>">
        Your Age: <input type="text" name = "age"/>
        <input type = "submit" value = "submit"/>
</form>
</body>
</html>
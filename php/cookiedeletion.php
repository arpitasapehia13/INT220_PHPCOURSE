<!DOCTYPE html>
<?php

// Set the expiration date to one hour ago
setcookie("gfg", "", time() - 3600);
?>

<html>

<body>

    <?php
    echo "Cookie  is deleted.";
    ?>
</body>

</html>


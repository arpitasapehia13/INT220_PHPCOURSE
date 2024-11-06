<?php
// Set a cookie that expires in one hour
setcookie("username", "Arpita", time() + 60, "/");

// To check if the cookie is set
if(isset($_COOKIE['username'])) {
    echo "Cookie value: " . $_COOKIE['username'];
} else {
    echo "Cookie is not set!";
}
?>

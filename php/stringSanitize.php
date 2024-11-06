<?php
$str = "<h1>Arpita<br>Sapehia</h1>";
$newStr = filter_var($str,FILTER_SANITIZE_STRING);
echo $newStr;
?>
<?php
if(file_exists("mytestfile.txt")){
    $file = fopen("mytestfile.txt","r");
}
else{
    die("Error:This file does not exist");
}
?>
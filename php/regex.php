<?php
$regex = '/^[a-zA-Z]*$/';
$nameString = "PHP";
if(preg_match($regex,$nameString)){
    echo ("Nmae string matching with regular expressions");
}
else{
    echo ("Only letters and white spaces allowed in name string");
}
?> 


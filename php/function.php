<?php
// function addition(&$val){
//     $val += 10;
// }

// $number = 5;
// addition($number);
// echo $number;

// function add($s, $t){
//     return $s + $t;
// }

// echo add(5, "8 days");


// function setHeight($minheight = 50){
//     echo "The height is: $minheight<br>";

// }
// setHeight(350);
// setHeight();
// setHeight(135);
// setHeight(80);


// function volume($h1) {
  
//     $coneVolume = cone($h1);
  
//     echo "The volume of the cone is: $coneVolume <br>";
// }

// function cone($h1){
   
//     return (1/3) * 3.14 * 3.14 * $h1;
// }
// volume(30);


// function cost($mrp = 3300, $discount = 10) {
//     return $mrp - ($mrp * $discount / 100);
// }

// echo cost(3300, 20);



$string = "Arpita Sapehia";
$reversedString = "";

for ($i = strlen($string) - 1; $i >= 0; $i--) {
    $reversedString .= $string[$i];
}

echo $reversedString;




?>
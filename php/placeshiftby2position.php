<?php
function shiftArrayByTwo($array) {
    $shiftedArray = array();
    $length = count($array); 

    for ($i = 0; $i < $length; $i++) {
        $newPosition = ($i + 2) % $length; 
        $shiftedArray[$newPosition] = $array[$i]; 
    }

    
    ksort($shiftedArray);
    return $shiftedArray;
}

$originalArray = [1, 2, 3, 4, 5];
$shiftedArray = shiftArrayByTwo($originalArray);

print_r($shiftedArray);
?>

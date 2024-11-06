<?php

function flattenArray($array){
    $result = array();
    foreach($array as $element){
        if(is_array($element)){
            $result = array_merge($result, flattenArray($element));

        }
        else{
            $result[] = $element;
        }

    }
    return $result;
}

$array = [1,2,[3,4,[5]]];
$flattenedArray = flattenArray($array);

print_r($flattenedArray);

// function calc($price,$tax = "")
// {
//     $total = $price + ($price*$tax);
//     echo $total;
// }
// Calc(42);
?>
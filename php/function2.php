<?php
function arraySum($array) {
    $sum = 0;
    foreach ($array as $element) {
        if (is_array($element)) {
            $sum += arraySum($element);
        } else {
            $sum += $element;
        }
    }
    return $sum;
}

$array = [[1,2,[3,4],5,[6,7,[8,9]],10,[11,[12,13],14],[[15,16],17]]];

$result = arraySum($array);
echo "The sum of all elements in this array is: " . $result . "\n";
?>

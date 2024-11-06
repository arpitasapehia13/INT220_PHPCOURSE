<?php
class Multiplication {
    public function __call($name, $args) {
        if ($name == 'multiply') {
            switch (count($args)) {
                case 1:
                    return $args[0];
                case 2:
                    return $args[0] * $args[1];
                case 3:
                    return $args[0] * $args[1] * $args[2];
                default:
                    return "Invalid number of arguments!";
            }
        }
    }
}

$s = new Multiplication();

echo "Return one value: " . $s->multiply(10) . "<br>";
echo "Return two values: " . $s->multiply(10, 20) . "<br>";
echo "Return three values: " . $s->multiply(10, 20, 30) . "<br>";
?>

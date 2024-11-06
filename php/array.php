<?php

$fruits = array("Apple", "Banana", "Cherry");

// Adding elements to the array
$fruits[] = "Date";
array_push($fruits, "Elderberry");

// Removing elements from the array
unset($fruits[1]);

// array_pop($fruits);



// Displaying the array
// print_r($fruits);


//Checking if element exists in an array
if(in_array("Cherry",$fruits)){
    echo "Cherry is in the array"."<br>";
}else{
    echo"Cherry is not in the array"."<br>";

}

//Getting length of the array
$length = count($fruits);
echo "The number of fruits in the array is: $length"."<br>";

//Sorting the array

sort($fruits);
echo "Sorted fruits in the array" . "<br>";

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";

}

//Merging two arrays
$vegetables = array("Carrot", "Broccoli");
$food = array_merge($fruits,$vegetables);
echo "Merged array of fruit and vegetables"."<br>";

foreach($food as $item){
    echo $item ."<br>";
}

//Slicing an array
$sliced_array = array_slice($food,2,3);
echo "Sliced array (3 elements starting from index 2):"."<br>";

foreach($sliced_array as $item){
    echo $item . "<br>";
}



?>

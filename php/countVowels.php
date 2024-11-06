<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Vowels</title>
</head>
<body>

<form method="get" >
    <label for="inputString">Enter String:</label>
    <input type="text" name="inputString" id="inputString" required>
    <br><br>
    <input type="submit" name="submit" value="Count Vowels">
</form>

<?php
if (isset($_GET['submit'])) {
    
    $inputString = $_GET['inputString'];

    function countVowels($str) {
       
        preg_match_all('/[aeiou]/', $str, $matches); //used to search 
        return count($matches[0]);  
    }

    $vowelCount = countVowels($inputString);

    echo "Number of vowels are: " . $vowelCount . "<br>";
}
?>

</body>
</html>

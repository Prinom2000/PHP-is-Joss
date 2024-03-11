<?php
function changeCase($array, $toUpper = true) {
    $newArray = array();

    // for($i=0; $i< count($array); $i++){
    //     if($toUpper){
    //         $newArray[$i]=strtoupper($array[$i]);
    //     }
    //     else{
    //         $newArray[$i]=strtolower($array[$i]);
    //     }
    // }

    foreach ($array as $key => $value) {  // key er moddhe ID jebe... 
        if ($toUpper) {
            $newArray[$key] = strtoupper($value);
        } else {
            $newArray[$key] = strtolower($value);
        }
    }
    return $newArray;
}

$Color = array('A' => 'Blue', 'B' => 'Green', 'C' => 'Red');
echo "The Initial array is: ";
print_r($Color);
echo "<br>";
// Convert values to lower case
echo "Values are in lower case.\n";
$lowerCaseArray = changeCase($Color, false);
print_r($lowerCaseArray);
echo "<br>";

// Convert values to upper case
echo "\nValues are in upper case.\n";
$upperCaseArray = changeCase($Color, true);
print_r($upperCaseArray);
echo "<br>";

$arr=array(1,2,3,4,5);
implode($arr);
?>

<?php
function bubbleSortDescending($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                // Swap $arr[$j] and $arr[$j + 1]
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Test the function
$numbers = array(5, 3, 9, 1, 6, 2, 8, 4, 7);
echo "Original array: " . implode(", ", $numbers) . "\n";

$sortedArray = bubbleSortDescending($numbers);
echo "<br>Sorted array (descending order): " . implode(", ", $sortedArray) . "\n";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Matrix Sum</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['size'])) {
    $size = $_POST['size'];

    if (isset($_POST['matrix'])) {
        $matrix = $_POST['matrix'];
        $rightDiagonalSum = 0;

        echo "<p>The matrix is:</p>";
        echo "<table border='1'>";
        for ($i = 0; $i < $size; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $size; $j++) {
                echo "<td>" . $matrix[$i][$j] . "</td>";
                if ($i == $j) {
                    $rightDiagonalSum += $matrix[$i][$j];
                }
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<p>Addition of the right diagonal elements is: $rightDiagonalSum</p>";
    } else {
        echo "<form action='' method='post'>";
        echo "<p>Input elements in the matrix:</p>";

        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                echo "element - [$i],[$j] : <input type='number' name='matrix[$i][$j]' required><br>";
            }
        }

        echo "<input type='hidden' name='size' value='$size'>";
        echo "<button type='submit'>Calculate Sum</button>";
        echo "</form>";
    }
} else {
    // If size is not submitted, display the form to input the size of the matrix
    echo "<form action='' method='post'>";
    echo "<label>Input the size of the square matrix: </label>";
    echo "<input type='number' name='size' required>";
    echo "<button type='submit'>Submit</button>";
    echo "</form>";
}
?>

</body>
</html>

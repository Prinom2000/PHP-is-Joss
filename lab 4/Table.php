<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
</head>
<body>
    <h2>Multiplication Table Generator</h2>
    <form method="post" action="">
        <label for="input_number">Enter a number:</label><br>
        <input type="number" id="input_number" name="input_number" min="1"><br><br>
        <input type="submit" value="Generate Table">
    </form>

    <?php

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if input is not empty
        if (!empty($_POST["input_number"])) {
            $size = $_POST["input_number"];
            echo "<h3>Multiplication Table for $size:</h3>";
            echo "<table border='1'>";
            for($i=1; $i<=$size; $i++ ){
                echo "<tr>";
                for($j=1; $j<=$size; $j++){
                    echo "<td>".($i*$j). "</td>";
                }
                echo "</tr>";
            }
            
            echo "</table>";
        } 
        else {
            echo "<h3>Please enter a number.</h3>";
        }
    }


    ?>
</body>
</html>



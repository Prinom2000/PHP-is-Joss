<!DOCTYPE html>
<html>
<head>
    <title>Number Rhombus Structure</title>
</head>
<body>
    <h2>Number Rhombus Structure</h2>
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
            $num = $_POST["input_number"];
            echo "<h3>Structure for $num:</h3><br>";
            
            // Upper half of the rhombus
        for ($i = 1; $i <= $num; $i++) {
            // Spaces
            for ($j = $num; $j > $i; $j--) {
                echo "&nbsp;&nbsp;";
            }
            // Increasing sequence
            for ($k = $i; $k >= 1; $k--) {
                echo $k;
            }
            // Decreasing sequence
            for ($l = 2; $l <= $i; $l++) {
                echo $l;
            }
            echo "<br>";
        }

        // Lower half of the rhombus
        for ($i = $num - 1; $i >= 1; $i--) {
            // Spaces
            for ($j = $num; $j > $i; $j--) {
                echo "&nbsp;&nbsp;";
            }
            // Increasing sequence
            for ($k = $i; $k >= 1; $k--) {
                echo $k;
            }
            // Decreasing sequence
            for ($l = 2; $l <= $i; $l++) {
                echo $l;
            }
            echo "<br>";
        }
            
        } 
        else {
            echo "<h3>Please enter a number.</h3>";
        }
    }


    ?>
</body>
</html>



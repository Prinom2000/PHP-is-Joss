<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Pattern</title>
    <link rel="stylesheet" href="abc.css">
</head>
<body>
    <form method="POST" action="">
        Enter a value for 'n': <input type="text" name="n">
        <input type="submit" name="submit" value="Generate Pattern">
    </form>
    <div class="pm">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST['n'];
            if (is_numeric($n) && $n > 0) {
                // Upper half of the pattern
                for ($i = 0; $i < $n; $i++) {
                    for ($j = 0; $j < $i; $j++) {
                        echo "&nbsp;&nbsp;";
                    }
                    
                    for ($k = 0; $k < (2 * ($n - $i)) - 1; $k++) {
                        echo "*";
                    }
                    
                    
                    echo "<br>";
                }
                // Lower half of the pattern
                for ($i = $n - 2; $i >= 0; $i--) {
                    for ($j = 0; $j < $i; $j++) {
                        echo "&nbsp;&nbsp;";
                    }
                    for ($k = 0; $k < (2 * ($n - $i)) - 1; $k++) {
                        echo "*";
                    }
                    echo "<br>";
                }
            } else {
                echo "Please enter a valid positive number.";
            }

        
    }
    ?>
    </div>
    
</body>
</html>
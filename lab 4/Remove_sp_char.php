<!DOCTYPE html>
<html>
<head>
    <title>Remove Special Characters</title>
</head>
<body>
    <h2>Remove Special Characters from String</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input_string">Enter a string:</label><br>
        <input type="text" id="input_string" name="input_string"><br><br>
        <input type="submit" value="Remove Special Characters">
    </form>

    <?php
    function removeSpecialCharacters($string) {
        // Define the pattern of special characters
        $pattern = '/[!@#$%^&*_=+-\\<>\?\/]/';
        
        // Remove special characters using preg_replace
        $clean_string = preg_replace($pattern, '', $string);
        
        return $clean_string;
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if input is not empty
        if (!empty($_POST["input_string"])) {
            $input_string = $_POST["input_string"];
            $cleaned_string = removeSpecialCharacters($input_string);
            echo "<h3>Original string: " . $input_string . "</h3>";
            echo "<h3>String after removing special characters: " . $cleaned_string . "</h3>";
        } else {
            echo "<h3>Please enter a string.</h3>";
        }
    }
    ?>
</body>
</html>

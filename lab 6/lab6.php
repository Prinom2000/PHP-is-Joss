<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<style>
.error { color: red; }
</style>
</head>
<body>

<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "spring2022";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define regular expressions
    $name_pattern = "/^[a-zA-Z]+(?:\s+[a-zA-Z]+){1,2}$/";
    // $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/";
    $ip_pattern = "/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
    $url_pattern = "/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/";
    $mobile_pattern = "/^(?:\+?88)?01[3-9]\d{8}$/";

    // Validate input fields
    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required";
    } elseif (!preg_match($name_pattern, $_POST["name"])) {
        $errors["name"] = "Invalid name format";
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    // if (empty($_POST["password"])) {
    //     $errors["password"] = "Password is required";
    // } elseif (!preg_match($password_pattern, $_POST["password"])) {
    //     $errors["password"] = "Invalid password format";
    // }

    if (empty($_POST["ip_address"])) {
        $errors["ip_address"] = "IP Address is required";
    } elseif (!preg_match($ip_pattern, $_POST["ip_address"])) {
        $errors["ip_address"] = "Invalid IP address format";
    }

    if (empty($_POST["personal_url"])) {
        $errors["personal_url"] = "Personal Web URL is required";
    } elseif (!preg_match($url_pattern, $_POST["personal_url"])) {
        $errors["personal_url"] = "Invalid URL format";
    }

    if (empty($_POST["dob"])) {
        $errors["dob"] = "Date of Birth is required";
    } else {
        $dob = new DateTime($_POST["dob"]);
        $today = new DateTime();
        $age = $dob->diff($today)->y;
        if ($age < 18) {
            $errors["dob"] = "You must be at least 18 years old";
        }
    }

    if (empty($_POST["gender"])) {
        $errors["gender"] = "Gender is required";
    }

    if (empty($_POST["mobile"])) {
        $errors["mobile"] = "Mobile Number is required";
    } elseif (!preg_match($mobile_pattern, $_POST["mobile"])) {
        $errors["mobile"] = "Invalid mobile number format";
    }

    if (empty($_POST["brief_info"])) {
        $errors["brief_info"] = "Brief Info is required";
    } elseif (str_word_count($_POST["brief_info"]) > 50) {
        $errors["brief_info"] = "Brief Info should not contain more than 50 words";
    } else {
        // Replace offensive words
        $offensive_words = array("damn", "kill", "death", "liar");
        $censored_info = str_ireplace($offensive_words, "****", $_POST["brief_info"]);
        $_POST["brief_info"] = $censored_info;
    }

    if (empty($errors)) {
        // Insert data into database
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
        $ip_address = $_POST["ip_address"];
        $personal_url = $_POST["personal_url"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $mobile = $_POST["mobile"];
        $brief_info = $_POST["brief_info"];

        $sql = "INSERT INTO prinom (name, email, password, ip_address, personal_url, dob, gender, mobile, brief_info)
                VALUES ('$name', '$email', '$password', '$ip_address', '$personal_url', '$dob', '$gender', '$mobile', '$brief_info')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }

    $conn->close();
}
?>

<h2>Registration Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    
    <label for="ip_address">IP Address:</label>
    <input type="text" id="ip_address" name="ip_address" value="192.168.0.1" required><br>
    
    <label for="personal_url">Personal Web URL:</label>
    <input type="url" id="personal_url" name="personal_url" required><br>
    
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required><br>
    
    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label><br>
    
    <label for="mobile">Mobile Number:</label>
<input type="tel" id="mobile" name="mobile" required><br>

<label for="brief_info">Brief Info:</label><br>
<textarea id="brief_info" name="brief_info" rows="5" cols="30" required></textarea><br>

<input type="submit" name="register" value="Register">
</form>

</body>
</html>
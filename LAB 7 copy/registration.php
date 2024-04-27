<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <?php
        // Function to validate email format
        function isValidEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        // Function to validate password length
        function isValidPassword($password) {
            return strlen($password) >= 6; // Minimum password length
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Include database connection file
            require_once "db_connection.php";

            // Retrieve form data
            $name = $_POST["name"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"];
            $email = $_POST["email"];
            $usertype = $_POST["usertype"];

            // Validate inputs
            $errors = array();
            if (empty($name)) {
                $errors[] = "Name is required.";
            }
            if (!isValidEmail($email)) {
                $errors[] = "Invalid email format.";
            }
            if (!isValidPassword($password)) {
                $errors[] = "Password must be at least 6 characters long.";
            }
            if ($password !== $confirmPassword) {
                $errors[] = "Passwords do not match.";
            }

            // If no validation errors, proceed with registration
            if (empty($errors)) {
                // Prepare SQL statement and execute
                $sql = "INSERT INTO users (name, password, email, usertype) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                // $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash password
                $stmt->bind_param("ssss", $name, $password, $email, $usertype);
                if ($stmt->execute()) {
                    echo "Registration successful!";
                } else {
                    echo "Error: " . $conn->error;
                }
                $stmt->close();
            } else {
                // Display validation errors
                foreach ($errors as $error) {
                    echo '<p class="error">' . $error . '</p>';
                }
            }

            // Close database connection
            $conn->close();
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Name:</label><br>
            <input type="text" name="name" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            <label>Confirm Password:</label><br>
            <input type="password" name="confirm_password" required><br>
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            <label>User Type:</label><br>
            <select name="usertype">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <input type="submit" value="Register">
            <div style="margin-top: 20px">
                
                <a href="login.php" style="margin-top: 15px;">Login</a>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

        input[type="email"],
        input[type="password"] {
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
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <?php
        session_start();

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Include database connection file
            require_once "db_connection.php";

            // Retrieve form data
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Validate inputs
            $errors = array();
            if (empty($email)) {
                $errors[] = "Email is required.";
            }
            if (empty($password)) {
                $errors[] = "Password is required.";
            }

            // If no validation errors, proceed with login
            if (empty($errors)) {
                // Prepare SQL statement and execute
                $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if user exists and password is correct
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["email"] = $email;
                    $_SESSION["usertype"] = $row["usertype"];
                    $_SESSION["name"] = $row["name"];
                    header("Location: dashboard.php"); // Redirect to dashboard or home page
                    exit; // Prevent further execution
                } else {
                    $errors[] = "Invalid email or password.";
                }
                $stmt->close();
            }

            // Display validation errors
            foreach ($errors as $error) {
                echo '<p class="error">' . $error . '</p>';
            }

            // Close database connection
            $conn->close();
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            <input type="submit" value="Login">
            <div style="margin-top: 20px">
                <a href="registration.php" style="margin-top: 15px;">Register</a>
            </div>
        </form>
    </div>
</body>
</html>

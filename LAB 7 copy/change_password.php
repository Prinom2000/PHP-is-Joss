<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
            width: 80%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-group {
            text-align: center;
        }

        .btn-group button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-group button:last-child {
            margin-right: 0;
        }

        .btn-group button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 10px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <?php
        // Start the session
        session_start();

        // Check if user is logged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Process form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Include database connection file
                require_once "db_connection.php";

                // Retrieve form data
                $currentPassword = $_POST["current_password"];
                $newPassword = $_POST["new_password"];
                $confirmNewPassword = $_POST["confirm_new_password"];

                // Retrieve user's email from session
                $email = $_SESSION["email"];

                // Retrieve user's current password from the database
                $sql = "SELECT password FROM users WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                // Verify current password
                if ($row && $row["password"] === $currentPassword) {
                    // Update password in the database
                    $updateSql = "UPDATE users SET password = ? WHERE email = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("ss", $newPassword, $email);
                    if ($updateStmt->execute()) {
                        echo '<p style="color: green; text-align: center;">Password changed successfully!</p>';
                    } else {
                        echo '<p style="color: red; text-align: center;">Error updating password.</p>';
                    }
                    $updateStmt->close();
                     header("Location: login.php");
                } else {
                    echo '<p style="color: red; text-align: center;">Incorrect current password.</p>';
                }

                // Close database connection
                $conn->close();
            }
        } else {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit;
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="current_password">Current Password:</label><br>
            <input type="password" id="current_password" name="current_password" required><br>
            <label for="new_password">New Password:</label><br>
            <input type="password" id="new_password" name="new_password" required><br>
            <label for="confirm_new_password">Confirm New Password:</label><br>
            <input type="password" id="confirm_new_password" name="confirm_new_password" required><br>
            <div class="btn-group">
                <button type="submit">Change Password</button>
            </div>
        </form>
    </div>
</body>
</html>

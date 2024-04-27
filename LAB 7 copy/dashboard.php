<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
            margin-bottom: 20px;
        }

        .welcome-msg {
            text-align: center;
            margin-bottom: 20px;
        }

        .menu-item {
            margin-bottom: 10px;
        }

        .menu-item a {
            display: block;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }

        .menu-item a:hover {
            background-color: #45a049;
        }

        .logout {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        // Check if user is logged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Display welcome message
            echo '<h2>Welcome ' . $_SESSION["name"] . '</h2>';

            // Display menu based on user type
            echo '<div class="menu-item"><a href="profile.php">Profile</a></div>';
            echo '<div class="menu-item"><a href="change_password.php">Change Password</a></div>';
            
            if ($_SESSION["usertype"] === 'admin') {
                echo '<div class="menu-item"><a href="view_users.php">View Users</a></div>';
            }

            // Logout button
            echo '<div class="logout"><a href="logout.php">Logout</a></div>';
        } else {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit;
        }
        ?>
    </div>
</body>
</html>

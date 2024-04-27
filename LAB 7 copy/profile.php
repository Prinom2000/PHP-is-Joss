<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            max-width: 600px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .go-back {
            text-align: center;
            margin-top: 20px;
        }

        .go-back button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .go-back button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <?php
        // Start the session
        session_start();

        // Check if user is logged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            // Include database connection file
            require_once "db_connection.php";

            // Retrieve user information from session
            $email = $_SESSION["email"];

            // Retrieve user information from database
            $sql = "SELECT id, name, email, usertype FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                echo '<table>';
                echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>User Type</th></tr>';
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["name"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["usertype"] . '</td>';
                echo '</tr>';
                echo '</table>';
            } else {
                echo '<p>No user found.</p>';
            }

            // Close database connection
            $conn->close();
        } else {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit;
        }
        ?>
        <div class="go-back">
            <button onclick="goBack()">Go Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

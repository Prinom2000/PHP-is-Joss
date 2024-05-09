<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
div{
    color: green;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;
    text-align: center;
    
}

a{
    /* color: blueviolet; */
}

</style>

<body>
<div>
        <h1>LOGIN</h1><br>
        <form method="post" action="">
            <label for="id">User ID:</label><br>
            <input type="text" id="user_id" name="user_id" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="p" name="p" required><br>
            

            <input type="submit" name="register" value="Login"><br>

            <a href="prinom.php">Register</a>
        </form>

    

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $dbname = "login";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(!empty($_POST["user_id"])) {
            $id = $_POST["user_id"];
            // echo"$id";
        }
        if(!empty($_POST["p"])) {
            $pass = $_POST["p"];
            // echo"$pass";
        }

        // find those in database:

        $sql = "SELECT * FROM reg WHERE id = '$id' AND pass = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User found, do something
            $row = $result->fetch_assoc();
            echo "Welcome, " . $row["name"];

            // Initialize the sesiion:
            $_SESSION['id']= $row['id'];
            $_SESSION['pass']= $row['pass'];
            $_SESSION['name']= $row['name'];
            $_SESSION['email']= $row['email'];
            $_SESSION['type']= $row['type'];

            header("Location:http://localhost/prinom/lab7/Home%20page.php");
        } else {
            // No user found with the given credentials
            echo "Invalid ID or password";
        }

            $conn->close();
        }
    ?>
</div>

</body>
</html>
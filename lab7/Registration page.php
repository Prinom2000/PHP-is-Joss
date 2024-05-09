<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

    <h1>Registration</h1>
    <form method="post" action="">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="con_password">Confirm Password:</label><br>
        <input type="password" id="con_password" name="con_password" required><br>
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="type">User Type [User/Admin]:</label> <br>
        <select name="type" id="type">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select> <br><br>

        <input type="submit" name="register" value="Register"><br>

        <a href="login.php">Login</a>
    </form>



<?php

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

        $id = $_POST['id'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $pass="";

            if ($password == $con_password) {
                $pass=$con_password;
                $sql = "INSERT INTO reg (id, pass, name, email, type)
                    VALUES ('$id', '$pass', '$name', '$email', '$type')";

                if ($conn->query($sql) == TRUE) {
                echo "<br><br>Registration successful!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            else{
                echo "<br><br>Password not match.....!";
                echo "<br>Registration Unsuccessful.....!";
            }


        $conn->close();
    }
?>

</div>

</body>
</html>
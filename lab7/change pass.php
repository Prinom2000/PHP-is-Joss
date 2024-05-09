<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<style>
    table, th, td, tr{
        border: 1px solid black;
        border-collapse: collapse;
        margin: auto;
    }

    div{
    color: black;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;
    text-align: center;
    
    }
</style>


<body>
<div>
    <h1>Change Password</h1>
    <br>

    <form method="post" action="">
        <label for="cur_pass">Current Password</label><br>
        <input type="text" name="cur_pass" id="cur_pass" required><br>
        <label for="new_pass">New Password</label><br>
        <input type="text" name="new_pass" id="new_pass" required><br>
        <label for="retype_new_pass">Retype New Password</label><br>
        <input type="text" name="retype_new_pass" id="retype_new_pass" required><br><br>

        <input type="submit" name="Change" value="Change"><br><br>
        <a href="Home page.php">Home</a>
    </form>
</div>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Database connection
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "login";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo"Database not connected......!";
            exit();
        }


        $cur_pass = $_POST["cur_pass"];
        $new_pass = $_POST["new_pass"];
        $retype_new_pass = $_POST["retype_new_pass"];

        // echo"$cur_pass <br>";

        
        if (isset($_SESSION["id"]) && $_SESSION["pass"]){
            $id= $_SESSION["id"];
            $pass= $_SESSION["pass"];
        }

        if($new_pass == $retype_new_pass && $cur_pass==$pass){
            $sql="UPDATE reg
            SET pass = '$new_pass'
            WHERE id = '$id';
            ";

            $conn->query($sql);

            echo "<br>Password Updated.........!<br>";
        }
        else{
            echo "<br>Password is not match...! <br>Try again<br>";
        }
        
    }

    ?>

</body>
</html>
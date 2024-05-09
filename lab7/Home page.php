<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
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
<!-- Home page -->
<br><br>

<div>
    <br>
    <?php
    session_start();
    if (isset($_SESSION["id"]) && $_SESSION["pass"]){
        echo"Welcome ", $_SESSION['name'], ' !<br><br>';
        if($_SESSION['type']=="Admin"){
            

            echo "<a href='profile.php'>Profile</a> <br>";
            echo "<a href='change pass.php'>Change Password</a> <br>";
            echo "<a href='view user.php'>View User</a><br>";
            echo "<a href='logout.php'>Logout</a><br>";
        }
        else{
            echo "<a href='profile.php'>Profile</a> <br>";
            echo "<a href='change pass.php'>Change Password</a> <br>";
            echo "<a href='logout.php'>Logout</a><br>";
        }

    }
    ?>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

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
        <?php
            session_start();
            echo"Good Bye ". $_SESSION['name']. '<br>';
            session_unset();
            session_destroy();
        ?>

        <h1>You are logged out.....!</h1><br>
        <a href="login.php">Login Again</a><br>
        <p>Thanks from PRINOM 👨‍💻</p>

        


    </div>
   

</body>
</html>
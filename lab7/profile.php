<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<style>
    table, th, td, tr{
        border: 1px solid black;
        border-collapse: collapse;
    }

    div{
    color: green;
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 100px;
    text-align: center;
    
    }


</style>
<body>
    <div>
        <?php
            session_start();
            if (isset($_SESSION["id"]) && $_SESSION["pass"]){
                // echo $_SESSION['name'], '<br>';
                // echo $_SESSION['email'], '<br>';
                // echo $_SESSION['type'], '<br>';

                echo"<table>";
                    echo "<tr>";
                        echo "<th colspan='2'> Prfile </th>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>ID </td>";
                        echo "<td>", $_SESSION['id'],"</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>Name </td>";
                        echo "<td>", $_SESSION['name'],"</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td>Email </td>";
                        echo "<td>", $_SESSION['email'],"</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td>USER TYPE</td>";
                        echo "<td>", $_SESSION['type'],"</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<th colspan='2'> <a href='Home page.php'>Go Home</a><br> </th>";
                    echo "</tr>";

                    

                echo"</table>";
                
            }

        ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>
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
    <?php
        
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
    $sql = "SELECT * FROM reg";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
        <th colspan='4'>User</th>
        </tr>";

        echo "<tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>USER TYPE</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["id"] ."</td>";
            echo "<td>". $row["name"] ."</td>";
            echo "<td>". $row["email"] ."</td>";
            echo "<td>". $row["type"] ."</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<th colspan='4'> <a href='Home page.php'>Go Home</a><br> </th>";
        
    }

    

    ?>
    </div>
</body>
</html>
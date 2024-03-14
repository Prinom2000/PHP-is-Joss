<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2D MATTRIX</title>
</head>
<body>
    <form action="" method="POST">
    Input the size of squer matrix: <input type="text" name="n" id="n">
    <input type="submit" value="ENTER">
    <br>
    <br>


    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $n=$_POST["n"];
        $arr=[];
        for($i=0; $i<$n; $i++){
            for($j=0; $j<$n; $j++){
                echo "Element - [$i][$j]: <input type='number' name='arr[$i][$j]' required><br>";
                
            }
        }
    }

    // for($i=0; $i<$n; $i++){
    //     for($j=0; $j<$n; $j++){
    //         echo $arr[$i][$j];
            
    //     }
    // }

    ?>

    </form>
    <?php

    
    ?>
    
</body>
</html>
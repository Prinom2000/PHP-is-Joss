<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyphen</title>
    <link rel="stylesheet" href="abc.css">
</head>
<body>
    <form method="POST" action="">
        Enter a value for 'n': <input type="text" name="n">
        <input type="submit" name="submit" value="Generate series">
    </form>
    <div class="pm">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST['n'];
        echo "<br>";
        $c=1;
        for($i=1; $i<=$n; $i++){
            
            if($c==1){
                if($i==$n){
                    echo $i;
                }
                else{echo $i, "-";}
                    
            }
            
            if($c==2){
                if($i==$n){
                    echo $i;
                }
                else{echo $i, "_";}
                    
            }
            
            if($c==3){
                if($i==$n){
                    echo $i;
                    $c=1;
                }
                else{
                    echo $i, "#";
                    $c=1;}
            }
            $c++;
            
            

        }
            


        
    }
    ?>
    </div>
    
</body>
</html>
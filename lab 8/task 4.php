<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class circle{
            private $radius ;

            function setRadius($r){
                $this->radius= $r;
            }

            function area(){
                return 3.1416 * $this->radius * $this->radius;
            }

            function Circumference(){
                return 2 * 3.1416 * $this->radius;
            }


        }

        $ob= new circle();

        $ob->setRadius(3);

        echo "Area: ", $ob->area(), "<br>";
        echo "Circumference: ", $ob->Circumference() ,"<br>";

    ?>
</body>
</html>
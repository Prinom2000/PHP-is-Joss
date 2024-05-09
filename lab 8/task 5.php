<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Box{
            private $length;
            private $width;
            private $height;

            function __construct($length, $width, $height){
                $this->length= $length;
                $this->width= $width;
                $this->height= $height;


            }

            function area(){
                return $this->length * $this->width * $this->height;
            }
        }

        $ob= new Box(2,3,4);

        echo "Area: ", $ob->area();
    ?>
</body>
</html>
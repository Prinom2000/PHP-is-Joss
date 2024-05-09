<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class Rectangle {
    public $width=0, $height=0;

    function __construct($w , $h) {
        $this->width=$w;
        $this->height=$h;
      }

    public function showArea(){
        return $this->width * $this->height;
    }
}


$w = 3;
$h= 4;

$ob1= new Rectangle($w,$h);
echo "Area: ". $ob1->showArea();


?>
</body>
</html>
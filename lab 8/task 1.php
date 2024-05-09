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
    private $width=0, $height=0;

    function __construct($w , $h) {
        $this->width=$w;
        $this->height=$h;
      }



    public function  setWidth($w){
        $this->width=$w;
    }
    
    public function  setHeight($h){
        $this->height=$h;
    }


    public function  getWidth(){
        return $this->width;
    }
    
    public function  getheight(){
        return $this->height;
    }

    public function showArea(){
        return $this->width * $this->height;
    }
}


$w = 3;
$h= 4;

$ob1= new Rectangle(3,4);
echo "Area: ". $ob1->showArea();


?>


</body>
</html>
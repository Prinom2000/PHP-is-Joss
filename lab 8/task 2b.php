<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

class Calculator {
    public $myValue;

    function __construct($v) {
        $this->myValue=$v;
      }

    // public function  setvalue($v){
    //     $this->myValue=$v;
    // }
    public function  square(){
        return $this->myValue * $this->myValue;
    }
    public function  qube(){
        return $this->myValue * $this->myValue * $this->myValue;
    }

}

$ob= new Calculator(3);
echo $ob->square();
echo "<br>";
echo $ob->qube();

?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class student{
            private $name , $id, $cgpa;
            public function __construct($name, $id, $cgpa){
                $this->name = $name;
                $this->id = $id;
                $this->cgpa = $cgpa;
            }

            // Encapsulation:
            public function get_name(){
                return $this->name;
            }
            public function get_id(){
                return $this->id;
            }
            public function get_cgpa(){
                return $this->cgpa;
            }
            public function set_name($name){
                $this->name = $name;
            }

            public function set_id($id){
                $this->id = $id;
            }

            public function set_cgpa($cgpa){
                $this->cgpa = $cgpa;
            }
            


        }

        $ob1= new student("Prinom","100",3.54) ;
        $ob2= new student("Anu","101",3.00) ;

        echo "Avg CGPA: ", ($ob1->get_cgpa()+$ob2->get_cgpa())/2;
        
    ?>
</body>
</html>
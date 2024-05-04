<?php

session_start();

if (isset($_SESSION["name"]) && $_SESSION["pass"]){
    echo"Wellcome: ". $_SESSION['name']. '<br>';
    echo"Your password is: ". $_SESSION['pass']. '<br>';
}
else{   
    echo"Please login to continue.......!";

}



?>
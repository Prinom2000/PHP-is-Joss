<?php

session_start();

if (isset($_SESSION["name"]) && $_SESSION["pass"]){
    echo"Bye ". $_SESSION['name']. '<br>';
    session_unset();
    session_destroy();
    echo"You are loged out.......!<br>";
}
else{   
    echo"Please login to continue.......!<br>";
    echo"Set name & pass...<br>";

}





?>
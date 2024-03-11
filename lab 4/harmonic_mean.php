<?php
function isprime($num){
    if($num<2){
        return false;
    }

    for($i=2; $i<= sqrt($num); $i++){
        if($num % $i==0){
            return false;
        }

    }
    return true;
}
$sum=0;
$c=0;
for($i=2000; $i<=8000; $i++){
    if(isprime($i)){
        $c++;
        $sum=$sum+(1/$i);
    }
}

if($c>0){
    $har_mean=$c/$sum;
    echo "Harmonic Mean of prime numbers between 2000 and 8000 is: ", $har_mean;
}
else{
    echo "There is no harmonic mean brtween 2000 and 8000.";
}

?>
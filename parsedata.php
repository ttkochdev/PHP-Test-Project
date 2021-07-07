<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 


function parseCandy($result){
    foreach($result as $value ){
        //has candy 
        if(strpos($value['comments'], 'candy')){
            $candy[] = $value;
        }
    }
    unset($value);
    //return candy comments array
    return $candy;
}
//parseCandy($result);

function parseCallMe($result){
    foreach($result as $value ){
        //has call me 
        if(strpos(strtolower($value['comments']), 'call me')){ //just in case upper case is an issue
            $callme[] = $value;
        }
    }
    unset($value);
    //return callme comments array
    return $callme;
}
?>
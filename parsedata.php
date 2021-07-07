<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 


function parseCandy($result){ //need better candy algorithm!!! specific candies missing
    foreach($result as $value ){
        //has candy 
        if(strpos(strtolower($value['comments']), 'candy')){
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

function parseRefer($result){
    foreach($result as $value ){
        //has refer
        if(strpos(strtolower($value['comments']), 'refer')){ //just in case upper case is an issue
            $refer[] = $value;
        }
    }
    unset($value);
    //return callme comments array
    return $refer;
}

function parseSignature($result){ //for some reason?? 30830492 	signature is NOT required Expected Ship Date: 01/04/18 
    foreach($result as $value ){
        //has Signature
        $mystring = strtolower($value['comments']);
        $findme   = 'signature';
        $pos = strpos($mystring, $findme);

        // Note our use of ===.  Simply == would not work as expected
        // because the position of 'a' was the 0th (first) character.
        if ($pos === false) {
            //echo "The string '$findme' was not found in the string '$mystring'";
        } else {
            $signature[] = $value;
        }
    }
    unset($value);
    //return sig comments array
    return $signature;
}

function parseMisc($result){ 
    foreach($result as $value ){
        if( !strpos(strtolower($value['comments']), 'candy') &&
            !strpos(strtolower($value['comments']), 'call me') &&
            !strpos(strtolower($value['comments']), 'refer') && 
            !strpos(strtolower($value['comments']), 'signature') //strpos issues at position 0. need to fix! 
        ){ 
            $misc[] = $value;
        }
    }
    unset($value);
    //return sig comments array
    return $misc;
}

function cleanUpDatetimeData($result){ 
    foreach($result as $value ){

        if(strpos(strtolower($value['comments']), 'expected ship date: ')){             
            $string = strtolower($value['comments']);
            $find = 'expected ship date: ';
            $pos = strpos($string, $find);
            $substr = substr($string, $pos+20, 8); //need to error check this incoming data!
            $dateval[] = array('orderid'=>$value['orderid'], 'shipdate_expected'=>stringToDatetime($substr));            
        }
    }
    unset($value);
    //echo "<pre>";
    //print_r($dateval);
    return $dateval;
}
?>
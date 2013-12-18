<?php

//Php code to create functions to validate strings, integers, and prices

// function to validate string
function validate_string($in_str){
	
    /* 
    (string) -> string

    strips $in_str off any characters that are not a-z A-Z 0-9 _ & whitespace
    check the length of the new string
    if its not equal to 0 and less than 21, return the string
    otherwise, return a string "bad input. 	
    */

    $str = preg_replace("/[^a-zA-Z0-9_ ]/", "", $in_str);
    if(strlen($str) != 0 && strlen($str) < 21){
        return $str;	
    }else{
        $str = "bad input";
        return $str;
    }
    
}

/*
function valid_int($in_int) {
$int = $in_int;
settype($int,'integer');
return $int;
}

function valid_price($in_price) {
$price = $in_price;
settype($price,'double');
$price = floor($price*100.0)/100.0;
return $price;
}
*/

?>
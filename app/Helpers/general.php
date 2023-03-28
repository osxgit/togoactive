<?php
function sha1_multiple() : string{
    $args = func_get_args();
    return sha1(serialize($args));
}

function formatPrice($currency, $price){
    if($currency =='IDR'){
        return number_format($price,0);
    } else{
       return number_format($price,2);
    }
}

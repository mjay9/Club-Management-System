<?php

function xss($var){
    $var = str_replace("<", "&lt;", $var);
    $var = str_replace(">", "&gt;", $var);
    return $var;
}

?>
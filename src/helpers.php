<?php



if(!function_exists('helper')) {
    function helper($function_name, $params = NULL)
    {
        $function_name = str_replace('.', '', $function_name);
        return require 'helpers/'.$function_name.'.php';
    }
}

if(!function_exists('custom_abort')) {

    function custom_abort($response)
    {
        return require 'helpers/'.__FUNCTION__.'.php';
    }
   
}




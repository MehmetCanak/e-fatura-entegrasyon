<?php



if(!function_exists('helper')) {
    function helper_($function_name, $params = NULL)
    {
        $function_name = str_replace('.', '', $function_name);
        return require 'helpers/'.$function_name.'.php';
    }
}

if(!function_exists('custom_abort_')) {

    function custom_abort_($response)
    {
        return require 'helpers/'.__FUNCTION__.'.php';
    }
   
}




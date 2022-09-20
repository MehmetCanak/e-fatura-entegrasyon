<?php

if(is_string($response))
{ 
    $message = $response;
    $response = helper_('response_error', $response);
}
else if(is_array($response))
{
    $message = json_encode($response);
    $response = helper_('response_error', $response);
}
else if(get_class($response) == 'Illuminate\Http\JsonResponse')
    $message = $response->getData()->data->message;
else
    dd('abort control');

abort($response);
<?php

namespace web36\EFatura\Services;

abstract class AbstractService
{
    protected $stateExplanation;
    protected $documents;

    private const SUCCESS_CODE = 
    [
        '0'
    ];


    protected $queryStateErrorCodes = 
    [
        '510' ,'511'
    ];

    public function controlResponse($response)
    {

        if(!isset($response->return ) || $response->return == null)
                            return false;
        
        $response = $response->return;
        if (! in_array($response->queryState, self::SUCCESS_CODE)) {
           custom_abort_("Error Message : ". $response->stateExplanation . " Error Code : " . $response->queryState);
        }
        if(!isset($response->documents) && $response->documents == null) 
           custom_abort_("Error Message : ". $response->stateExplanation . " Error Code : " . $response->queryState);
        
        return $response->documents;   
    }





}

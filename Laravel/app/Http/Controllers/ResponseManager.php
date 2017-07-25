<?php

namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: Me
 * Date: 5/30/2017
 * Time: 5:54 PM
 */
use App\app_codes\ErrorCodes;
use App\ResponsePayload;


class ResponseManager
{

    public static function createSuccessJsonResponse( $payload )
    {

        return response()->json( new ResponsePayload( $payload ) );
    }

    public static function createFailedResponse( $errorPayload, $errorCode, $errorMessage, $httpErrorCode )
    {

        if ( empty( $httpErrorCode ) || $httpErrorCode == null )
            return response()->json( new ResponsePayload( $errorPayload, false, $errorCode, $errorMessage ) );

        return response()->json( new ResponsePayload( $errorPayload, false, $errorCode, $errorMessage ), $httpErrorCode );
    }

    public static function createRuntimeExceptionResponse( \Exception $e )
    {

        ResponseManager::createFailedResponse(
            $e,
            ErrorCodes::$RUNTIME_EXCEPTION_CODE,
            ErrorCodes::$RUNTIME_EXCEPTION_MESSAGE,
            null
        );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 5/30/2017
 * Time: 7:54 PM
 */

namespace App\app_codes;


class ErrorCodes
{

    public static $VALIDATION_FAILED_MESSAGE = "input validation failed";
    public static $RUNTIME_EXCEPTION_MESSAGE = "exception";
    public static $BEACON_NOT_FOUND_MESSAGE = "beacon not found";
    public static $SQL_OPERATION_FAILED_MESSAGE = "sql operation failed";

    public static $VALIDATION_FAILED_CODE = 1;
    public static $RUNTIME_EXCEPTION_CODE = 2;
    public static $BEACON_NOT_FOUND_CODE = 3;
    public static $SQL_OPERATION_FAILED_CODE = 4;

}
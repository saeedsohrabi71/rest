<?php
/**
 * Created by PhpStorm.
 * User: Me
 * Date: 5/30/2017
 * Time: 5:13 PM
 */

namespace App;


class ResponsePayload
{

    public function __construct( $payload = null, $isSuccess = true, $errorCode = null, $message = null )
    {

        $this->isSuccess = $isSuccess;
        $this->errorCode = $errorCode;
        $this->message = $message;
        $this->payload = $payload;
    }

    public $isSuccess;

    public $errorCode;

    public $message;

    public $payload;


}
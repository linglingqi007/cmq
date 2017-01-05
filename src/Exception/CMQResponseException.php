<?php

namespace Tiger\CMQ\Exception;

class CMQResponseException extends CMQException
{

    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
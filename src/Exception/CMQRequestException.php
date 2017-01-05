<?php

namespace Tiger\CMQ\Exception;

class CMQRequestException extends CMQException
{

    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
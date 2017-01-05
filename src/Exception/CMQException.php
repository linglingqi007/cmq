<?php

namespace Tiger\CMQ\Exception;

class CMQException extends \Exception
{
    protected $code = 999999;

    public function __construct($message, $code = 0, $previous = null)
    {
        if ($code) {
            $this->code = $code;
        }

        parent::__construct($message, $this->code, $previous);
    }
}
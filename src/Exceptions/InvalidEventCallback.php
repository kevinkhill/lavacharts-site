<?php

namespace Khill\Lavacharts\Exceptions;

class InvalidEventCallback extends \Exception
{
<<<<<<< HEAD
    public function __construct($invalidEventCallback = null, $code = 0)
    {
        $message = gettype($invalidEventCallback) . " is an invalid event callback, must a (string) of a previously defined javascript function in page.";

        parent::__construct($message, $code);
=======
    public function __construct($invalidEventCallback)
    {
        $message  = gettype($invalidEventCallback) . ' is an invalid event callback, ';
        $message .= 'must a non-empty (string) of a previously defined javascript function.';

        parent::__construct($message);
>>>>>>> origin/3.0
    }
}

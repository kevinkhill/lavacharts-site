<?php

namespace Khill\Lavacharts\Exceptions;

class InvalidDate extends \Exception
{
<<<<<<< HEAD
    public function __construct()
    {
        $message = 'Must be a Carbon instance or a datetime string parsable by Carbon.';
=======
    public function __construct($badString)
    {
        $message = 'Must be a Carbon instance or a datetime string able to be parsed by Carbon.';
>>>>>>> origin/3.0

        parent::__construct($message);
    }
}

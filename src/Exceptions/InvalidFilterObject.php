<?php

namespace Khill\Lavacharts\Exceptions;

class InvalidFilterObject extends \Exception
{
    public function __construct($invalidFilter, $types)
    {
<<<<<<< HEAD
        $message = "$invalidFilter is not a valid filter, must be one of $types";
=======
        $message = $invalidFilter . ' is not a valid filter, must be one of [ ' . implode(' | ', $types) . ']';
>>>>>>> origin/3.0

        parent::__construct($message);
    }
}

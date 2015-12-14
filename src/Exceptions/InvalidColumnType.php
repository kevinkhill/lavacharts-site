<?php

namespace Khill\Lavacharts\Exceptions;

class InvalidColumnType extends \Exception
{
    public function __construct($invalidType, $acceptedTypes, $code = 0)
    {
<<<<<<< HEAD
        $message = $invalidType . " is not a valid column type, must one of " . $acceptedTypes;
=======
        if (is_string($invalidType)) {
            $message = "$invalidType is not a valid column type.";
        } else {
            $message  = gettype($invalidType) . ' is not a valid column type.';
        }

        $message .= ' Must one of [ ' . implode(' | ', $acceptedTypes) . ' ]';
>>>>>>> origin/3.0

        parent::__construct($message, $code);
    }
}

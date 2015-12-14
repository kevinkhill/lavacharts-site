<?php

namespace Khill\Lavacharts\Exceptions;

class InvalidOption extends \Exception
{
<<<<<<< HEAD
    public function __construct($option, $options)
    {
        $shortest = -1;

        foreach ($options as $word) {
            $lev = levenshtein($option, $word);

            if ($lev <= $shortest || $shortest < 0) {
                $intended = $word;
                $shortest = $lev;
            }
        }

        $message = "'$option' is not a valid option, did you mean '$intended'?";

        parent::__construct($message);
=======
    public function __construct($option, $choices)
    {
        if (is_string($option) === false) {
            $option = gettype($option);
        }

        parent::__construct("'$option' is not a valid option, must be one of [ ".implode(' | ', $choices).' ]');
>>>>>>> origin/3.0
    }
}

<?php

namespace Khill\Lavacharts\Exceptions;

class DashboardNotFound extends \Exception
{
<<<<<<< HEAD
    public function __construct($type, $label)
=======
    public function __construct($label)
>>>>>>> origin/3.0
    {
        $message = "Dashboard('$label') was not found.";

        parent::__construct($message);
    }
}

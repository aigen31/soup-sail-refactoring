<?php

namespace App\Exceptions\Control\Project;

use Exception;

class DelegatedProjectsException extends Exception
{
    public function __construct($count) {
        $this->message = 'The amount of linked projects exceeds ' . $count;
    }
}

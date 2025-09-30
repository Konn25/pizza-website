<?php

namespace App\Exceptions;

use App\FailType;

class WorkTimeRegistrationException extends Exception
{
    public function __construct() {
        
        parent::__construct(FailType::WorkTimeRegistration);
    }
}

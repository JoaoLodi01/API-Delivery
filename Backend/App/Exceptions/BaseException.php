<?php

namespace App\Exceptions;

use Exception;

abstract class BaseDomainException extends Exception
{
    protected int $statusCode = 400;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
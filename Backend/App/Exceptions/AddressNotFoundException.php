<?php

namespace App\Exceptions\Address;

use App\Exceptions\BaseDomainException;
use Exception;

class AddressNotFoundException extends BaseDomainException
{
    protected int $statusCode = 400;
    protected $message = 'Endereço não encontrado';
}
<?php

namespace App\Exceptions\Address;

use Exception;

class AddressNotFoundException extends Exception
{
    protected $message = 'Endereço não encontrado';
}
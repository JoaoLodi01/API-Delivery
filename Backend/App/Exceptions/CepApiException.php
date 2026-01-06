<?php

namespace App\Exceptions\Cep;

use App\Exceptions\BaseDomainException;
use Exception;

class CepApiException extends BaseDomainException
{
    protected int $statusCode = 404;
    protected $message = 'Endereço não localizado';
}
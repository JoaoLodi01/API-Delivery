<?php

namespace App\Exceptions\Cep;

use Exception;

class CepApiException extends Exception
{
    protected $message = 'Erro ao consultar o CEP';
}
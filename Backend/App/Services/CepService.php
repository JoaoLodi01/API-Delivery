<?php

namespace App\Services;

use App\DTOs\AddressDto;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Support\Facades\Http;

class CepService 
{
    public function getCepApi(string $cep): AddressDto
    {
        $cep = preg_replace('/\D/', '', $cep);

        /**
         * Necessário por conta que a IDE não reconhece como response
         * @var Response $res
         */
        $res = Http::withoutVerifying()
            ->timeout(5)
            ->get("https://brasilapi.com.br/api/cep/v2/{$cep}");

        if ($res->failed()) {
            throw new \Exception('Erro ao consultar CEP: ' . $res);
        }

        return AddressDto::resApi($res->json());
    }
}
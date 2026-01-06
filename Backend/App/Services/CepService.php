<?php

namespace App\Services;

use App\DTOs\CepDto;
use App\Exceptions\Cep\CepApiException;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Support\Facades\Http;

class CepService 
{
    public function getCepApi(string $cep): CepDto
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
            throw new CepApiException();
        }

        $data = $res->json();

        return CepDto::fromApi($res->json());
    }
}
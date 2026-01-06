<?php

namespace App\Http\Controllers;

use App\Http\Requests\CepRequest;
use App\Http\Responses\ApiResponse;
use App\Services\CepService;

class CepController extends Controller
{   
    public function __construct(
        private CepService $cepService
    )
    {}

    public function search(CepRequest $request)
    {
        $cep = $request->validated()['cep'];

        $data = $this->cepService->getCepApi($cep);
        
        if (!$data) {
            return ApiResponse::error(
                message: 'CEP não encontrado.',
                errors: null,
                status: 404
            );
        }

        return ApiResponse::success(
            message: 'CEP encontrado com sucesso!',
            data: $data
        );
    }
}

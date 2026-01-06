<?php

namespace App\Exceptions;

use App\Exceptions\Address\AddressNotFoundException;
use App\Http\Responses\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->renderable(function (ValidationException $e) {
            return ApiResponse::error(
                'Erro de validação',
                $e->errors(),
                false,
                422
            );
        });

        $this->renderable(function (AddressNotFoundException $e) {
            return ApiResponse::error(
                $e->getMessage(),
                [],
                false,
                404
            );
        });

        $this->renderable(function (Throwable $e) {
            Log::channel('errors')->error('Erro detectado:', [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'code' => $e->getCode(),
                'error' => $e->getMessage(),
            ]);

            return ApiResponse::error(
                'Erro interno do servidor',
                [],
                false,
                500
            );
        });
    }
}

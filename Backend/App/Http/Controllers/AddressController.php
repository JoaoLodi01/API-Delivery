<?php

namespace App\Http\Controllers;

use App\DTOs\AddressStoreDto;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Responses\ApiResponse;
use App\Services\AddressService;

class AddressController extends Controller
{
    public function __construct(
        private AddressService $addressService
    )
    {}

    public function index()
    {
        return ApiResponse::success('Sucesso', $this->addressService->index());
    }

    public function show(int $id)
    {
        return ApiResponse::success('Sucesso', $this->addressService->show($id));
    }

    public function store(StoreAddressRequest $request)
    {
        $dto = AddressStoreDto::fromDTO($request->validated());

        return ApiResponse::success(
            'Sucesso', 
            $this->addressService->store($dto), 201
        );
    }

    public function update(StoreAddressRequest $request, int $id)
    {
        $dto = AddressStoreDto::fromDTO($request->validated());

        return ApiResponse::success(
            'Sucesso', 
            $this->addressService->update($dto, $id));
    }

    public function destroy(int $id)
    {
        return ApiResponse::success('Sucesso', $this->addressService->destroy($id));   
    }
}

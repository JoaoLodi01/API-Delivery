<?php

namespace App\Services;

use App\DTOs\AddressDto;
use App\DTOs\AddressStoreDto;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AddressService 
{
    public function __construct(
        private AddressRepository $addressRepository,
        private CepService $cepService
    )
    {}

    public function index()
    {
        return $this->addressRepository->index();
    }

    public function show(int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address){
            throw new \Exception('Endereço não encontrado');
        }

        return $address;
    }

    public function store(AddressStoreDto $dto)
    {
        $resultApi = $this->cepService->getCepApi($dto->cep);

        $storeData = new AddressStoreDto (
            cep: $resultApi->cep,
            street: $resultApi->street,
            neighborhood: $resultApi->neighborhood,
            city: $resultApi->city,
            state: $resultApi->state,
            number: $dto->number,
            complement: $dto->complement,
            reference: $dto->reference,
        );

        return DB::transaction(fn () => $this->addressRepository->store($storeData));
    }

    public function update(AddressStoreDto $dto, int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address) {
            throw new \Exception('Endereço não encontrado');
        }

        if ($dto->cep && $dto->cep !== $address->cep){
            $cepApi = $this->cepService->getCepApi($dto->cep);
        }
        
        $addressDto = new AddressStoreDto(
            cep: $cepApi->cep ?? $address->cep,
            street: $cepApi->street ?? $address->street,
            neighborhood: $cepApi->neighborhood ?? $address->neighborhood,
            city: $cepApi->city ?? $address->city,
            state: $cepApi->state ?? $address->state,
            number: $dto->number ?? $address->number,
            complement: $dto->complement ?? $address->complement,
            reference: $dto->reference ?? $address->reference,
        );

        return DB::transaction(fn () => $this->addressRepository->update($address, $dto));
    }

    public function destroy(int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address){
            throw new \Exception('Endereço não encontrado');
        }

        return $this->addressRepository->destroy($id);
    }
}
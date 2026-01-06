<?php

namespace App\Services;

use App\DTOs\AddressStoreDto;
use App\Exceptions\Address\AddressNotFoundException;
use App\Repositories\Contracts\AddressRepositoryContract;
use Illuminate\Support\Facades\DB;

class AddressService 
{
    public function __construct(
        private AddressRepositoryContract $addressRepository,
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
            throw new AddressNotFoundException();
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
            service: $resultApi->service,
            complement: $dto->complement,
            reference: $dto->reference,
            latitude: $resultApi->latitude,
            longitude: $resultApi->longitude,
        );

        return DB::transaction(fn () => $this->addressRepository->store($storeData));
    }

    public function update(AddressStoreDto $dto, int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address) {
            throw new AddressNotFoundException();
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
            service: $cepApi->service ?? $address->service,
            complement: $dto->complement ?? $address->complement,
            reference: $dto->reference ?? $address->reference,
            latitude: $cepApi->latitude ?? $address->latitude,
            longitude: $cepApi->longitude ?? $address->longitude,
        );

        return DB::transaction(fn () => $this->addressRepository->update($address, $addressDto));
    }

    public function destroy(int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address){
            throw new AddressNotFoundException();
        }

        return $this->addressRepository->destroy($id);
    }
}
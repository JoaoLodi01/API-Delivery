<?php

namespace App\Services;

use App\DTOs\AddressDto;
use App\DTOs\AddressStoreDto;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Support\Facades\Http;

class AddressService 
{
    public function __construct(
        private AddressRepository $addressRepository
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
        return $this->addressRepository->store($dto);
    }

    public function update(AddressStoreDto $dto, int $id)
    {
        $address = $this->addressRepository->show($id);

        if (!$address) {
            throw new \Exception('Endereço não encontrado');
        }

        return $this->addressRepository->update($address, $dto);
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
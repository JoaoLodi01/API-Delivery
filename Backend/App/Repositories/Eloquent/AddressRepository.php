<?php

namespace App\Repositories\Eloquent;

use App\DTOs\AddressStoreDto;
use App\Exceptions\Address\AddressNotFoundException;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\AddressRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;

class AddressRepository implements AddressRepositoryContract
{
    public function index(): LengthAwarePaginator
    {
        return Address::where('active', true)->paginate(15);
    }

    public function show(int $id): Address
    {
        $address = Address::where('id', $id)
                    ->where('active', true)
                    ->first();

        if (!$address){
            throw new AddressNotFoundException();
        }

        return $address;
    }

    public function store(AddressStoreDto $dto): Address
    {
        return Address::create([
            'cep' => $dto->cep,
            'state' => $dto->state,
            'city' => $dto->city,
            'neighborhood' => $dto->neighborhood,
            'street' => $dto->street,
            'number' => $dto->number,
            'complement' => $dto->complement,
            'reference' => $dto->reference,
        ]);
    }

    public function update(Address $address, AddressStoreDto $dto): Address
    {
        $address->update([
            'cep' => $dto->cep,
            'state' => $dto->state,
            'city' => $dto->city,
            'neighborhood' => $dto->neighborhood,
            'street' => $dto->street,
            'number' => $dto->number,
            'complement' => $dto->complement,
            'reference' => $dto->reference,
        ]);

        return $address;
    }

    public function destroy(int $id)
    {
        $address = Address::find($id);

        if(!$address){
            throw new AddressNotFoundException();
        }

        return $address->update([
            'active' => false,
        ]);
    }
}
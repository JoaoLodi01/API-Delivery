<?php

namespace App\Repositories\Eloquent;

use App\DTOs\AddressStoreDto;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository 
{
    public function index(): Collection
    {
        return Address::all();
    }

    public function show(int $id): ?Address
    {
        return Address::find($id);
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

    public function destroy(int $id): bool
    {
        return Address::where('id', $id)
            ->update([
                'active' => false,
            ]) > 0;
    }
}
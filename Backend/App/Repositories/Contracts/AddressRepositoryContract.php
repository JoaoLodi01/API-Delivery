<?php

namespace App\Repositories\Contracts;

use App\DTOs\AddressStoreDto;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

interface AddressRepositoryContract
{
    public function index(): Collection;

    public function show(int $id): ?Address;

    public function store(AddressStoreDto $dto): Address;

    public function update(Address $address, AddressStoreDto $dto): Address;

    public function destroy(int $id): bool;
}
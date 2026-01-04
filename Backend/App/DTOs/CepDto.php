<?php

namespace App\DTOs;

class AddressDto 
{
    public function __construct(
        public string $cep,
        public string $state,
        public string $city,
        public ?string $neighborhood,
        public ?string $street,
    )
    {}

    public static function resApi(array $data): self
    {
        return new self(
            cep: $data['cep'],
            state: $data['state'],
            city: $data['city'],
            neighborhood: $data['neighborhood'] ?? null,
            street: $data['street'] ?? null,
        );
    }
}
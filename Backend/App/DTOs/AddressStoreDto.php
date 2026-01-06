<?php

namespace App\DTOs;

class AddressStoreDto 
{
    public function __construct(
        public string $cep,
        public string $state,
        public string $city,
        public string $street,
        public string $number,
        public ?string $neighborhood,
        public ?string $service,
        public ?string $complement,
        public ?string $reference, 
        public ?string $latitude,
        public ?string $longitude,
    )
    {}

    public static function fromDTO(array $data): self
    {
        return new self(
            cep: $data['cep'],
            state: $data['state'],
            city: $data['city'],
            street: $data['street'],
            number: $data['number'],
            neighborhood: $data['neighborhood'] ?? null,
            service: $data['service'] ?? null,
            complement: $data['complement'] ?? null,
            reference: $data['reference'] ?? null,
            latitude: $data['location']['latitude'] ?? null,
            longitude: $data['location']['longitude'] ?? null,
        );
    }
}
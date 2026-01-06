<?php

namespace App\DTOs;

class CepDto
{
    public function __construct(
        public string $cep,
        public string $state,
        public string $city,
        public ?string $neighborhood,
        public ?string $street,
        public ?string $service,
        public ?float $latitude,
        public ?float $longitude,
    ) {}

    public static function fromApi(array $data): self
    {
        return new self(
            cep: $data['cep'],
            state: $data['state'],
            city: $data['city'],
            neighborhood: $data['neighborhood'] ?? null,
            street: $data['street'] ?? null,
            service: $data['service'] ?? null,
            latitude: isset($data['location']['coordinates']['latitude'])
                ? (float) $data['location']['coordinates']['latitude']
                : null,
            longitude: isset($data['location']['coordinates']['longitude'])
                ? (float) $data['location']['coordinates']['longitude']
                : null,
        );
    }
}

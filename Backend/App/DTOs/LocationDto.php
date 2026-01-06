<?php

namespace App\DTOs;

class LocationDto
{
    public function __construct(
        public ?string $longitude,
        public ?string $latitude,
    ) {}

    public static function fromArray(?array $data): ?self
    {
        if (!$data) {
            return null;
        }

        return new self(
            longitude: $data['longitude'] ?? null,
            latitude: $data['latitude'] ?? null,
        );
    }
}
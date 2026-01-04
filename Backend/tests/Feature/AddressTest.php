<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_address(): void
    {
        $payload = [
            'cep' => '89705228',
            'street' => 'Rua Ricardo João Angonese',
            'number' => '243',
            'neighborhood' => 'Gruta',
            'city' => 'Concórdia',
            'state' => 'SC',
            'complement' => 'Casa baixa',
            'reference' => 'Num sei kk',
        ];

        $response = $this->postJson('/api/addresses', $payload);

        $response->assertStatus(201)->assertJsonPath('data.city', 'Concórdia');

        $this->assertDatabaseHas('addresses', [
            'cep' => '89705228',
            'city' => 'Concórdia',
        ]);
    }
}

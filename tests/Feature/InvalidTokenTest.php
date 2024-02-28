<?php

use Tests\TestCase;

class InvalidTokenTest extends TestCase
{
    /** @test */
    public function it_returns_an_error_for_invalid_token()
    {
        // Obtener el token del header
        $response = $this->withHeaders([
            'Authorization' => '()',
        ])->postJson('/api/v1/short-urls', ['url' => 'https://example.com']);

        $response
            ->assertStatus(400)
            ->assertJson(['error' => 'El token introducido no es válido.'
            ]);
    }
}

<?php

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ShortLinkSimulatorTest extends TestCase
{
    /** @test */
    public function it_responds_with_a_shortened_url()
    {
        // Simular una respuesta exitosa del servicio de acortamiento de URL
        Http::fake([
            'https://tinyurl.com/api-create.php*' => Http::response(['short_url' => 'https://tinyurl.com/abc123'], 200),
        ]);

        $response = $this->withHeaders([
            'Authorization' => '()',
        ])->postJson('/api/v1/short-urls', ['url' => 'https://example.com']);

        $response
            ->assertStatus(200)
            ->assertJson(['url' => 'https://tinyurl.com/abc123'
            ]);
    }
}

<?php

use App\Services\TinyUrlShortenerService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UrlShortenerServiceTest extends TestCase
{
    /** @test
     * @throws Exception
     */
    public function it_shortens_a_given_url()
    {
        // Mock del servicio externo para devolver una URL acortada
        Http::fake([
            'https://tinyurl.com/api-create.php*' => Http::response('https://tinyurl.com/abc123', 200),
        ]);

        $urlShortenerService = app(TinyUrlShortenerService::class);

        $shortenedUrl = $urlShortenerService->shorten('https://example.com');

        $this->assertEquals('https://tinyurl.com/abc123', $shortenedUrl);
    }
}

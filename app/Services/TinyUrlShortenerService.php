<?php

namespace App\Services;

use App\Contracts\UrlShortenerService;
use App\Exceptions\UrlShorteningFailedException;
use Exception;
use Illuminate\Support\Facades\Http;

class TinyUrlShortenerService implements UrlShortenerService
{
    /**
     * @throws Exception
     */
    public function shorten(string $url): string
    {
        $apiUrl = "https://tinyurl.com/api-create.php?url=" . $url;
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            return $response->body();
        }

        throw new UrlShorteningFailedException();
    }
}

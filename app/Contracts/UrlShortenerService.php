<?php

namespace App\Contracts;

interface UrlShortenerService
{
    public function shorten(string $url): string;
}

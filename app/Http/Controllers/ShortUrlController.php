<?php

namespace App\Http\Controllers;

use App\Contracts\UrlShortenerService;
use App\Exceptions\InternalErrorException;
use App\Exceptions\TokenEmptyException;
use App\Exceptions\TokenInvalidException;
use App\Exceptions\UrlNotProvidedException;
use App\Exceptions\UrlShorteningFailedException;
use App\Services\TokenValidationService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    private UrlShortenerService $urlShortener;
    private TokenValidationService $tokenValidator;

    public function __construct(UrlShortenerService $urlShortener, TokenValidationService $tokenValidator)
    {
        $this->urlShortener = $urlShortener;
        $this->tokenValidator = $tokenValidator;
    }

    /**
     * @throws InternalErrorException
     * @throws TokenEmptyException
     * @throws TokenInvalidException
     * @throws UrlNotProvidedException
     */
    public function shortUrl(Request $request): JsonResponse
    {
        $token = $request->bearerToken();

        if (empty($token)) {
            throw new TokenEmptyException();
        }

        if (!$this->tokenValidator->tokenIsValid($token)) {
            throw new TokenInvalidException();
        }

        if (empty($request->url)) {
            throw new UrlNotProvidedException();
        }

        try {
            $shortUrl = $this->urlShortener->shorten($request->url);

            return response()->json(['url' => $shortUrl]);
        } catch (Exception) {
            throw new InternalErrorException();
        }
    }
}

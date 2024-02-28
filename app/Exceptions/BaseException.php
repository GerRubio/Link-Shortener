<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BaseException extends Exception
{
    protected int $httpCode = ResponseAlias::HTTP_BAD_REQUEST;

    public function render(): JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage()
        ], $this->httpCode);
    }
}

<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UrlShorteningFailedException extends BaseException
{
    protected $message = 'Error al acortar URL.';
    protected int $httpCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
}

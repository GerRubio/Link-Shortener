<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UrlNotProvidedException extends BaseException
{
    protected $message = 'No se ha proporcionado una URL.';
    protected int $httpCode = ResponseAlias::HTTP_BAD_REQUEST;
}

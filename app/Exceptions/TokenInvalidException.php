<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TokenInvalidException extends BaseException
{
    protected $message = 'El token introducido no es válido.';
    protected int $httpCode = ResponseAlias::HTTP_BAD_REQUEST;
}

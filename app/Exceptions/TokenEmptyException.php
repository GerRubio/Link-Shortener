<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TokenEmptyException extends BaseException
{
    protected $message = 'No se ha introducido un token o no existe.';
    protected int $httpCode = ResponseAlias::HTTP_FORBIDDEN;
}

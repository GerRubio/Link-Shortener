<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class InternalErrorException extends BaseException
{
    protected $message = 'Se produjo un error al procesar la solicitud.';
    protected int $httpCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
}

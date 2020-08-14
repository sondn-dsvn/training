<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiErrorException extends HttpException
{
    private $apiCode;
    private $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    public function __construct(string $message = "", \Throwable $previous = null, array $headers = [], string $apiCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        parent::__construct($this->statusCode, $message, $previous, $headers);
        $this->apiCode = $apiCode;
    }

    public function getApiCode()
    {
        return $this->apiCode;
    }
}

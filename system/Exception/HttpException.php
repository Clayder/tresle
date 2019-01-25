<?php

namespace Tresle\Exception;

use Throwable;

class HttpException extends \Exception
{
    /**
     * HttpException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        http_response_code($code);
        parent::__construct($message, $code, $previous);
    }
}
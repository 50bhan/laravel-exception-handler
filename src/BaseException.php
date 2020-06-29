<?php

namespace Sharifi\Exceptions;

use Exception;

class BaseException extends Exception
{
    private int $statusCode = 500;

    /**
     * @var mixed
     */
    private $details = '';

    /**
     * Set HTTP response code
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Set HTTP response code
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details): void
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

}

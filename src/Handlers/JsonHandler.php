<?php

namespace Sharifi\Exceptions\Handlers;

use Throwable;

class JsonHandler implements HandlerInterface
{
    public function handle(Throwable $exception, string $id, int $statusCode, array $headers)
    {
        // TODO: Implement handle() method.
    }
}

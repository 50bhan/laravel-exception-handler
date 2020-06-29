<?php

namespace Sharifi\Exceptions\Handlers;

use Throwable;

interface HandlerInterface
{
    public function handle(Throwable $exception, string $id, int $statusCode, array $headers);
}

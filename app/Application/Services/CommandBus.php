<?php

namespace App\Application\Services;

use Illuminate\Pipeline\Pipeline;

class CommandBus
{
    public function __construct(
        protected array $middlewares = []
    ) {}

    public function dispatch(object $command): mixed
    {
        $handler = $this->resolveHandler($command);

        return app(Pipeline::class)
            ->send($command)
            ->through($this->middlewares)
            ->then(fn ($command) => $handler->handle($command));
    }

    protected function resolveHandler(object $command): object
    {
        $handlerClass = get_class($command) . 'Handler';

        if (!class_exists($handlerClass)) {
            throw new \RuntimeException("Handler [{$handlerClass}] not found for command " . get_class($command));
        }

        return app($handlerClass);
    }
}

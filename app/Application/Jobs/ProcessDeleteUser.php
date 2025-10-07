<?php

namespace App\Application\Jobs;

use App\Application\Services\CommandBus;
use App\Commands\User\DeleteUserCommand;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;
use Illuminate\Foundation\Queue\Queueable;

class ProcessDeleteUser implements ShouldQueueAfterCommit
{
    use Queueable;

    public int $tries = 10;
    public int $backoff = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $userId
    ) {}

    /**
     * Execute the job.
     */
    public function handle(CommandBus $bus): void
    {
        $bus->dispatch(new DeleteUserCommand($this->userId));
    }
}

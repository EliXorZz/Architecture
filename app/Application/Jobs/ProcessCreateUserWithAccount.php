<?php

namespace App\Application\Jobs;

use App\Application\Dto\AccountDTO;
use App\Application\Dto\UserDTO;
use App\Application\Services\CommandBus;
use App\Commands\User\CreateUserCommand;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;
use Illuminate\Foundation\Queue\Queueable;

class ProcessCreateUserWithAccount implements ShouldQueueAfterCommit
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private UserDTO $user,
        private AccountDTO $account
    ) {}

    /**
     * Execute the job.
     */
    public function handle(CommandBus $bus): void
    {
        $userDto = $bus->dispatch(new CreateUserCommand($this->user));
        ProcessAssociateUserWithAccount::dispatch($userDto, $this->account);
    }
}

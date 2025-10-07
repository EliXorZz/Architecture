<?php

namespace App\Application\Jobs;

use App\Application\Dto\AccountDTO;
use App\Application\Dto\UserDTO;
use App\Application\Services\CommandBus;
use App\Commands\Account\UpdateAccountCommand;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;
use Illuminate\Foundation\Queue\Queueable;

class ProcessAssociateUserWithAccount implements ShouldQueueAfterCommit
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
        $this->account->user_id = $this->user->id;
        $bus->dispatch(
            new UpdateAccountCommand($this->account->id, $this->account)
        );
    }
}

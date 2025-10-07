<?php

namespace App\Commands\Account;

use App\Application\Jobs\ProcessCreateUserWithAccount;
use App\Application\Services\CommandBus;
use Illuminate\Support\Facades\DB;

class CreateAccountWithUserCommandHandler
{
    public function __construct(
        private CommandBus $bus
    ) {}

    public function handle(CreateAccountWithUserCommand $command): void
    {
        DB::transaction(function () use ($command) {
            $accountDto = $this->bus->dispatch(new CreateAccountCommand($command->dto->account));
            ProcessCreateUserWithAccount::dispatch($command->dto->user, $accountDto);
        });
    }
}

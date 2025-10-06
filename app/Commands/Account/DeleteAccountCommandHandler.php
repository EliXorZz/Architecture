<?php

namespace App\Commands\Account;

use App\Interfaces\AccountRepositoryInterface;

class DeleteAccountCommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository
    ) {}

    public function handle(DeleteAccountCommand $command): void
    {
        $this->accountRepository->delete($command->id);
    }
}

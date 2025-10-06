<?php

namespace App\Commands\Account;

use App\Interfaces\AccountRepositoryInterface;

class UpdateAccountCommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository,
    ) {}

    public function handle(UpdateAccountCommand $command): void
    {
        $data = $command->dto->toArray();
        $this->accountRepository->update($command->id, $data);
    }
}

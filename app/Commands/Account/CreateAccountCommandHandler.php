<?php

namespace App\Commands\Account;

use App\Application\Dto\AccountDTO;
use App\Interfaces\AccountRepositoryInterface;

class CreateAccountCommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository,
    ) {}

    public function handle(CreateAccountCommand $command): AccountDTO
    {
        $data = $command->dto->toArray();
        $account = $this->accountRepository->create($data);

        return new AccountDTO(
            $account->id,
            $account->userId,
            $account->name,
            $account->currency,
            $account->iban,
            $account->balance,
        );
    }
}

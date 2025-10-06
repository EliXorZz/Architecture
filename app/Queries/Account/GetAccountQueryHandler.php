<?php

namespace App\Queries\Account;

use App\Application\Dto\AccountDTO;
use App\Application\Dto\UserDTO;
use App\Interfaces\AccountRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class GetAccountQueryHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository
    ) {}

    public function handle(GetAccountQuery $query): AccountDTO
    {
        $account = $this->accountRepository->find($query->id);

        return new AccountDTO(
            $account->id,
            $account->userId,
            $account->name,
            $account->currency,
            $account->iban,
            $account->balance
        );
    }
}

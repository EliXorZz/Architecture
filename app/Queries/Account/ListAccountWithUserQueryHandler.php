<?php

namespace App\Queries\Account;

use App\Application\Dto\AccountDTO;
use App\Application\Dto\UserWithAccountsDTO;
use App\Application\Services\CommandBus;
use App\Interfaces\AccountRepositoryInterface;
use App\Queries\User\GetUserQuery;

class ListAccountWithUserQueryHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository,
        private CommandBus $bus
    ) {}

    public function handle(ListAccountWithUserQuery $command): UserWithAccountsDTO
    {
        $user = $this->bus->dispatch(new GetUserQuery($command->userId));
        $accountEntities = $this->accountRepository->listByUser($command->userId);

        $accounts = [];
        foreach ($accountEntities as $accountEntity) {
            $accounts[] = new AccountDTO(
                $accountEntity->id,
                $accountEntity->userId,
                $accountEntity->name,
                $accountEntity->currency,
                $accountEntity->iban,
                $accountEntity->balance,
            );
        }

        return new UserWithAccountsDTO(
            $user->first_name,
            $user->last_name,
            $accounts
        );
    }
}

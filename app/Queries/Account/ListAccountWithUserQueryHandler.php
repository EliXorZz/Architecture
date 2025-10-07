<?php

namespace App\Queries\Account;

use App\Application\Dto\AccountDTO;
use App\Application\Dto\UserDTO;
use App\Application\Dto\UserWithAccountsDTO;
use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Facades\Http;

class ListAccountWithUserQueryHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository
    ) {}

    public function handle(ListAccountWithUserQuery $command): UserWithAccountsDTO
    {
        $userJson = Http::withUrlParameters([ 'userId' => $command->userId ])
            ->get('http://user-service/api/users/{userId}')
            ->throw()
            ->json();

        $user = UserDTO::from($userJson);
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

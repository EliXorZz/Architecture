<?php

namespace App\Commands\Account;

use App\Application\Jobs\ProcessDeleteUser;
use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DeleteAccountCommandHandler
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository
    ) {}

    public function handle(DeleteAccountCommand $command): void
    {
        DB::transaction(function () use ($command) {
            $account = $this->accountRepository->find($command->id);
            $this->accountRepository->delete($command->id);

            $accounts = $this->accountRepository->listByUser($account->userId);

            if (count($accounts) == 0) {
                ProcessDeleteUser::dispatch($account->id)
                    ->onQueue('user-service');
            }
        });
    }
}

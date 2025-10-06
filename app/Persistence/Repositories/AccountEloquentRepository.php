<?php

namespace App\Persistence\Repositories;

use App\Domain\Entities\AccountEntity;
use App\Interfaces\AccountRepositoryInterface;
use App\Persistence\Models\Account;

class AccountEloquentRepository implements AccountRepositoryInterface
{
    public function create(array $data): AccountEntity
    {
        $accountModel = (new Account)
            ->newQuery()
            ->create($data);

        return new AccountEntity(
            $accountModel->id,
            $accountModel->user_id,
            $accountModel->name,
            $accountModel->currency,
            $accountModel->iban,
            $accountModel->balance
        );
    }

    public function find(int $id): AccountEntity
    {
        $accountModel = (new Account)
            ->newQuery()
            ->where('id', $id)
            ->firstOrFail();

        return new AccountEntity(
            $accountModel->id,
            $accountModel->user_id,
            $accountModel->name,
            $accountModel->currency,
            $accountModel->iban,
            $accountModel->balance
        );
    }

    public function update(int $id, array $data): bool
    {
        return (new Account)
            ->newQuery()
            ->where('id', $id)
            ->update($data);
    }

    public function delete(int $id): void
    {
        (new Account)
            ->newQuery()
            ->where('id', $id)
            ->delete();
    }
}

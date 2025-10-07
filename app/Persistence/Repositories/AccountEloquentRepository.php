<?php

namespace App\Persistence\Repositories;

use App\Domain\Entities\AccountEntity;
use App\Interfaces\AccountRepositoryInterface;
use App\Persistence\Models\Account;
use App\Persistence\Models\User;

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

    public function listByUser(int $id): array
    {
        $accountModels = (new Account)
            ->newQuery()
            ->where('user_id', $id)
            ->get();

        $list = [];
        foreach ($accountModels as $accountModel) {
            $list[] = new AccountEntity(
                $accountModel->id,
                $accountModel->user_id,
                $accountModel->name,
                $accountModel->currency,
                $accountModel->iban,
                $accountModel->balance
            );
        }

        return $list;
    }

    public function deleteByUser(int $id): void
    {
        (new User)
            ->newQuery()
            ->where('user_id', $id)
            ->delete();
    }
}

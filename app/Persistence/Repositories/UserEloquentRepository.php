<?php

namespace App\Persistence\Repositories;

use App\Domain\Entities\UserEntity;
use App\Interfaces\UserRepositoryInterface;
use App\Persistence\Models\User;

class UserEloquentRepository implements UserRepositoryInterface
{
    public function create(array $data): UserEntity
    {
        $userModel = (new User)
            ->newQuery()
            ->create($data);

        return new UserEntity(
            $userModel->id,
            $userModel->first_name,
            $userModel->last_name,
            $userModel->email,
            $userModel->phone
        );
    }

    public function find(int $id): UserEntity
    {
        $userModel = (new User)
            ->newQuery()
            ->where('id', $id)
            ->firstOrFail();

        return new UserEntity(
            $userModel->id,
            $userModel->first_name,
            $userModel->last_name,
            $userModel->email,
            $userModel->phone
        );
    }

    public function update(int $id, array $data): bool
    {
        return (new User)
            ->newQuery()
            ->where('id', $id)
            ->update($data);
    }

    public function delete(int $id): void
    {
        (new User)
            ->newQuery()
            ->where('id', $id)
            ->delete();
    }
}

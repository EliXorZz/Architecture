<?php

namespace App\Repositories;

use App\Models\User;

class UserEloquentRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return (new User)
            ->newQuery()
            ->create($data);
    }

    public function find(int $id): User
    {
        return (new User)
            ->newQuery()
            ->where('id', $id)
            ->firstOrFail();
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

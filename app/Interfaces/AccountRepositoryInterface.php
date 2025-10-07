<?php

namespace App\Interfaces;

use App\Domain\Entities\AccountEntity;

interface AccountRepositoryInterface
{
    public function create(array $data): AccountEntity;
    public function find(int $id): AccountEntity;
    public function update(int $id, array $data): bool;
    public function delete(int $id): void;

    /**
     * @param int $id
     * @return AccountEntity[]
     */
    public function listByUser(int $id): array;
    public function deleteByUser(int $id): void;
}

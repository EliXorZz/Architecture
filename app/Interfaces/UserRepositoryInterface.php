<?php

namespace App\Interfaces;

use App\Domain\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function create(array $data): UserEntity;
    public function find(int $id): UserEntity;
    public function update(int $id, array $data): bool;
    public function delete(int $id): void;
}

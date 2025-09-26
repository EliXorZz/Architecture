<?php

namespace App\Services;

use App\Dto\UserDTO;

interface UserServiceInterface
{
    public function create(array $data): UserDTO;
    public function get(int $id): UserDTO;
    public function update(int $id, array $data): bool;
    public function delete(int $id): void;
}

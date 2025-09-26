<?php

namespace App\Application\Services;

use App\Application\Dto\UserDTO;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        public UserRepositoryInterface $userRepository
    ) {}

    public function create(array $data): UserDTO
    {
        $user = $this->userRepository->create($data);

        return new UserDTO(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $user->getProfile()
        );
    }

    public function get(int $id): UserDTO
    {
        $user = $this->userRepository->find($id);

        return new UserDTO(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $user->getProfile()
        );
    }

    public function update(int $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}

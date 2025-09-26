<?php

namespace App\Commands\User;

use App\Application\Dto\UserDTO;
use App\Interfaces\UserRepositoryInterface;

class CreateUserCommandHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(CreateUserCommand $command): UserDTO
    {
        $data = $command->dto->toArray();
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
}

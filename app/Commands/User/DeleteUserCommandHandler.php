<?php

namespace App\Commands\User;

use App\Interfaces\UserRepositoryInterface;

class DeleteUserCommandHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(CreateUserCommand $command): void
    {
        $this->userRepository->delete($command->id);
    }
}

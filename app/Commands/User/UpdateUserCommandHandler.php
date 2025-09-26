<?php

namespace App\Commands\User;

use App\Interfaces\UserRepositoryInterface;

class UpdateUserCommandHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(UpdateUserCommand $command): void
    {
        $data = $command->dto->toArray();
        $this->userRepository->update($command->id, $data);
    }
}
